<?php
/**
 * Collection of static utility methods used for convenience across
 * the client library.
 *
 * @author Chirag Shah <chirags@google.com>
 */
class Google_Utils {
  public static function urlSafeB64Encode($data) {
    $b64 = base64_encode($data);
    $b64 = str_replace(array('+', '/'), array('-', '_'), $b64);
    return rtrim($b64, '=');
  }

  public static function urlSafeB64Decode($b64) {
    $b64 = str_replace(array('-', '_'), array('+', '/'), $b64);
    $padding = strlen($b64) % 4;
    if ($padding > 0) {
      $b64 .= str_repeat('=', 4 - $padding);
    }
    return base64_decode($b64);
  }

  /**
   * Misc function used to count the number of bytes in a post body, in the world of multi-byte chars
   * and the unpredictability of strlen/mb_strlen/sizeof, this is the only way to do that in a sane
   * manner at the moment.
   *
   * This algorithm was originally developed for the
   * Solar Framework by Paul M. Jones
   *
   * @link   http://solarphp.com/
   * @link   http://svn.solarphp.com/core/trunk/Solar/Json.php
   * @link   http://framework.zend.com/svn/framework/standard/trunk/library/Zend/Json/Decoder.php
   * @param  string $str
   * @return int The number of bytes in a string.
   */
  static public function getStrLen($str) {
    return strlen(utf8_decode($str));
  }

  /**
   * Normalize all keys in an array to lower-case.
   * @param array $arr
   * @return array Normalized array.
   */
  public static function normalize($arr) {
    if (!is_array($arr)) {
      return array();
    }

    $normalized = array();
    foreach ($arr as $key => $val) {
      $normalized[strtolower($key)] = $val;
    }
    return $normalized;
  }
}
?>