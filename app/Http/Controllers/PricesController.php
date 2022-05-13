<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricesController extends Controller
{
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
    public static function GetProductPlans()
    {

    }
}
