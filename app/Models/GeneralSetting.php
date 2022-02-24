<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;

class GeneralSetting extends Model
{
    use HasFactory;
    /*-------------- 
    Basic info
     ---------------*/
    public static function getAppName() {
        $cache = self::getCache('basic_info');
        return isset($cache->app_name) ? $cache->app_name : "Pamilya Muna Party List";
    }

    public static function getHomePageTitle() {
        $cache = self::getCache('basic_info');
        return isset($cache->home_page_title) ? $cache->home_page_title : "Pamilya Muna Party List";
    }
    /*-------------- 
    Contact & Footer
     ---------------*/
    public static function getAddress() {
        $cache = self::getCache('contact_and_footer');
        return isset($cache->address) ? $cache->address : "";
    }

    public static function getPhone() {
        $cache = self::getCache('contact_and_footer');
        return isset($cache->phone_number) ? $cache->phone_number : "";
    }

    public static function getEmail() {
        $cache = self::getCache('contact_and_footer');
        return isset($cache->email) ? $cache->email : "";
    }
    public static function getCopyright() {
        $cache = self::getCache('contact_and_footer');
        return isset($cache->copyright) ? $cache->copyright : "";
    }
    
    /*-------------- 
    Others
     ---------------*/
    public static function getLogo() {
        $logo = self::getCache('logo');
        return $logo ? $logo : "";
    }

    public static function getCache($cache_type) {
        switch ($cache_type) {
            case 'basic_info':
                return json_decode(Cache::get('basic_info_cache'));
                break;

            case 'contact_and_footer':
                return json_decode(Cache::get('contact_and_footer_cache'));
                break;

            case 'logo':
                return Cache::get('logo_cache');
                break;
            default:
                # code...
                break;
        }
    }
}
