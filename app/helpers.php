<?php

use App\Models\NumberOfSearchResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * @param integer $length
 * @return string
 **/

if (!function_exists('random_string')) {
    function random_string($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, 61)];
        }

        return $randomString;
    }
}

if (!function_exists('replace_br')) {
    function replace_br($text = '')
    {
        return preg_replace('/\n/', '<br>', $text);
    }
}

function getCachedOption($key, $default = null)
{
    return Cache::remember($key, now()->addMinutes(5), function () use ($key, $default) {
        return option($key) ?? $default;
    });
}

// function countHistorySearchResults()
// {
//     $search = NumberOfSearchResult::where('member_id', Auth::guard('member')->id())->first();

//     return $search->number_of_results ?? 0;
// }



function simple_slug($string)
{
    $search = ['/', ';', '\'', '(', ')', ' ', '!', '*', ',', '&', '.','?','#','%'];

    $text = str_replace($search, '-', $string);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    $text = trim(mb_strtolower($text));
    $text = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $text);
    $text = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $text);
    $text = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $text);
    $text = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $text);
    $text = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $text);
    $text = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $text);
    $text = preg_replace('/(đ)/', 'd', $text);
    $text = preg_replace('/[^a-z0-9-\s]/', '', $text);
    $text = preg_replace('/([\s]+)/', '-', $text);


    return !empty($text) ? $text : 'n-a';
}

/**
 * check if url is valid
 * @param string $url
 * @return bool
 */
function isValidUrl($url)
{
    $pattern = '%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu';

    if (preg_match($pattern, $url)){
        return true;
    }

    return false;
}

/**
 * check if email is valid
 * @param string $email
 * @return bool
 */
function isValidEmail($email = '')
{
    $pattern = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';

    return preg_match($pattern, $email) ? true : false;
}

function getFileSizeInBytes($filePath = '')
{
    if (file_exists($filePath)){
        return filesize($filePath);
    }

    return 0;
}

function getFileMimeType($filePath = '')
{
    if (file_exists($filePath)){
        return mime_content_type($filePath);
    }

    return '';
}

function isImage($path = '')
{
    $imageExtensions = ['gif','jpg','jpeg','png', 'webp', 'svg'];
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive

    return in_array($ext, $imageExtensions);
}

function isVideo($path = '')
{
    $imageExtensions = ['mp4','avi', 'mkv'];
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive

    return in_array($ext, $imageExtensions);
}

/**
 * @param array $params
 * @return bool|string
 */
function cacheKey($params = [])
{
    if ($params){
        $newParams = array_map('strval', $params);

        return md5(json_encode($newParams));
    }

    return false;
}

function createPublicFolder(string $path = '')
{
    if (!empty($path)) {
        $dir = public_path($path);
        if (!is_dir($dir)) {
            $oldmask = umask(0);
            @mkdir($dir, 0775, true);
            umask($oldmask);
        }
    }
}
