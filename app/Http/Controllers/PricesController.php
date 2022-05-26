<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricesController extends Controller
{
    public static function CallImStockerApi($method, $args = []){

        $url = (!empty($_ENV['IMSTOCKER_API_HOST']) ? $_ENV['IMSTOCKER_API_HOST'] : 'https://api.imstocker.com') . '/api/' . $method;
        $content = json_encode(array_merge(
            $args, [
                'key' => !empty($_ENV['STUDIO_SITE_KEY']) ? $_ENV['STUDIO_SITE_KEY'] : null
            ]
        ));

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        if (!empty($_ENV['IMSTOCKER_API_IGNORE_SSL'])) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        }

        $json_response = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ( $status != 201 && $status != 200 ){
            throw new \Exception("Wrong api answer status: " . $status);
        }

        curl_close($curl);

        $res = json_decode($json_response, true);
        if (!empty($res['error'])){
            throw new \Exception($res['error']['message']);
        }

        return !empty($res['res']) ? $res['res'] : null;
    }

    public static function GetProFeatures($selected_feature, $type){
        if ($type === 'studio') {
            return [
                ['name' => 'keywordingTool', 'free' => true, 'pro' => true, 'selected' => false],
                ['name' => 'vectorImagesSupport', 'free' => true, 'pro' => true, 'selected' => $selected_feature && in_array($selected_feature, ['video'])],
                ['name' => 'extendedMetadataTools', 'free' => false, 'pro' => true, 'selected' => $selected_feature && in_array($selected_feature, ['metaImport', 'metaExport', 'metaCompare', 'metaOther', 'metaStrip', 'metaSets', 'metaReplace', 'viewModeTable'])],
                ['name' => 'fileUploading', 'free' => false, 'pro' => true, 'selected' => $selected_feature && in_array($selected_feature, ['fileUpload'])],
                ['name' => 'metadataTranslation', 'free' => false, 'pro' => true, 'selected' => $selected_feature && in_array($selected_feature, ['metaTranslate'])],
            ];
        }
        else {
            return [
                ['name' => 'keyworderBase', 'free' => true, 'pro' => true, 'selected' => false],
                ['name' => 'keyworderRank', 'free' => true, 'pro' => true, 'selected' => false],
                ['name' => 'keyworderSave', 'free' => true, 'pro' => true, 'selected' => false],
                ['name' => 'keyworderStudioPro', 'free' => false, 'pro' => true, 'selected' => $selected_feature && in_array($selected_feature, ['keyworderStudioPro'])],
                ['name' => 'metadataTranslation', 'free' => false, 'pro' => true, 'selected' => $selected_feature && in_array($selected_feature, ['metaTranslate'])],
                ['name' => 'keyworderIncreaseLimit', 'free' => false, 'pro' => true, 'selected' => $selected_feature && in_array($selected_feature, ['keyworderIncreaseLimit'])],
            ];
        }
    }
    public static function GetProductPlans(){
        $res = self::CallImStockerApi('studio/getProductsForStudioSite');
        $product_plans_map = [];
        foreach ($res['productPlans'] as $product_plan){
            $product_plan['discount'] = null;
            $product_plans_map[$product_plan['name_product_plan']] = $product_plan;
        }
        if (!empty($product_plans_map['ims_studio_pro_1y']) && !empty($product_plans_map['ims_studio_pro_3m'])){
            $product_plans_map['ims_studio_pro_1y']['discount'] =
                $product_plans_map['ims_studio_pro_3m']['price_product_plan'] / $product_plans_map['ims_studio_pro_3m']['months_num'] * 12 -
                $product_plans_map['ims_studio_pro_1y']['price_product_plan'];
        }
        return $product_plans_map;
    }
}
