<?php

namespace Drupal\gt_tools\Controller;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class UNLicenseController{

  public static function check_license_data(string $domain, string $license) {

    $url = "https://hg.gatech.edu/ajax/usablenet-validate/$domain/$license";

    $ch = UNLicenseController::curl_setup($url);

    $data['data'] = curl_exec($ch);
    $data['info'] = curl_getinfo($ch);
    $data['err'] = curl_error($ch);
    curl_close($ch);

    return $data['data'] === 'true'? TRUE: FALSE;
  }

  private static function curl_setup($url) {
    $ch = curl_init($url);

    $mr = 5;
    $rch = curl_copy_handle($ch);
    curl_setopt($rch, CURLOPT_URL, $url);
    curl_setopt($rch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($rch, CURLOPT_HEADER, TRUE);
    curl_setopt($rch, CURLOPT_NOBODY, TRUE);
    curl_setopt($rch, CURLOPT_FORBID_REUSE, FALSE);
    curl_setopt($rch, CURLOPT_RETURNTRANSFER, TRUE);

    // follow up to $mr redirects
    do {
      $header = curl_exec($rch);
      if (curl_errno($rch)) {
        $code = FALSE;
      } else {
        $code = curl_getinfo($rch, CURLINFO_HTTP_CODE);
        if ($code == 301 || $code == 302) {
          preg_match('/Location:(.*?)\n/', $header, $matches);
          $newurl = trim(array_pop($matches));
        } else {
          $code = FALSE;
        }
      }
    } while ($code && --$mr);

    curl_close($rch);
    curl_setopt($ch, CURLOPT_URL, isset($newurl) ? $newurl : $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    return $ch;
  }
}
