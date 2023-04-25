<?php
namespace Cblink\BaiduCloudAiSdk;

class ApiService
{
    /**
     * 获取token
     * @param string $appKey 应用的API Key
     * @param string $secret 应用的Secret Key
     * @link https://ai.baidu.com/ai-doc/REFERENCE/Ck3dwjhhu
     *
     * @return \Cblink\BaiduCloudAiSdk\ApiDto
     */
    public function getTokenApi($appKey, $secret)
    {
        return new ApiDto('oauth/2.0/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $appKey,
            'client_secret' => $secret,
        ]);
    }

    /**
     * AI作画
     *
     * @param string $text 输入内容，长度不超过100个字（操作指南详见 https://ai.baidu.com/ai-doc/NLP/qlakgh129）
     * @param string $resolution 图片分辨率，可支持1024*1024、1024*1536、1536*1024
     * @param string $style 目前支持风格有：探索无限、古风、二次元、写实风格、浮世绘、low poly 、未来主义、像素风格、概念艺术、赛博朋克、洛丽塔风格、巴洛克风格、超现实主义、水彩画、蒸汽波艺术、油画、卡通画
     * @param int $num
     * @link https://cloud.baidu.com/doc/NLP/s/Ml9i5amtk
     *
     * @return \Cblink\BaiduCloudAiSdk\ApiDto
     */
    public function getWenXinTxt2imgApi($text, $resolution, $style, $num = 1)
    {
        return new ApiDto('rpc/2.0/ernievilg/v1/txt2img', [
            'text' => $text,
            'resolution' => $resolution,
            'style' => $style,
            'num' => $num,
        ]);
    }

    /**
     * 查询AI作画结果
     *
     * @param string $taskId 从AI作画请求的提交接口的返回值中获取
     * @link https://cloud.baidu.com/doc/NLP/s/Ml9i5amtk#%E6%9F%A5%E8%AF%A2%E7%BB%93%E6%9E%9C
     *
     * @return \Cblink\BaiduCloudAiSdk\ApiDto
     */
    public function getWenXinImgResultApi($taskId)
    {
        return new ApiDto('rpc/2.0/ernievilg/v1/getImg', [
            'taskId' => $taskId,
        ]);
    }

    /**
     * 数据集创建API
     *
     * @param string $type 数据集类型，可包括： IMAGE_CLASSIFICATION, OBJECT_DETECTION, IMAGE_SEGMENTATION, SOUND_CLASSIFICATION, TEXT_CLASSIFICATION , TEXT_CLASSIFICATION_MUL
    分别对应：图像分类、物体检测、图像分割、声音分类、文本分类（单标签） 、文本分类（多标签）
     * @param string $datasetName 数据集名称，长度不超过20个utf-8字符
     * @link https://ai.baidu.com/ai-doc/EASYDL/rkbh90ak5#%E6%9F%A5%E7%9C%8B%E6%95%B0%E6%8D%AE%E9%9B%86%E5%88%97%E8%A1%A8api
     *
     * @return \Cblink\BaiduCloudAiSdk\ApiDto
     */
    public function getEasyDLCreateDataSetApi($type, $datasetName)
    {
        return new ApiDto('rpc/2.0/easydl/dataset/create', [
            'type' => $type,
            'datasetName' => $datasetName,
        ]);
    }

    /**
     * 查看数据集列表API
     *
     * @param string $type 数据集类型，可包括： IMAGE_CLASSIFICATION, OBJECT_DETECTION, IMAGE_SEGMENTATION, SOUND_CLASSIFICATION, TEXT_CLASSIFICATION, TEXT_CLASSIFICATION_MUL
    分别对应：图像分类、物体检测、图像分割、声音分类、文本分类（单标签）、文本分类（多标签）
     * @param int $start 起始序号，默认为0
     * @param int $num 数量，默认20，最多100
     * @link https://ai.baidu.com/ai-doc/EASYDL/rkbh90ak5#%E6%9F%A5%E7%9C%8B%E6%95%B0%E6%8D%AE%E9%9B%86%E5%88%97%E8%A1%A8api
     *
     * @return \Cblink\BaiduCloudAiSdk\ApiDto
     */
    public function getEasyDLDataSetListApi($type, $start, $num)
    {
        return new ApiDto('rpc/2.0/easydl/dataset/list', [
            'type' => $type,
            'start' => $start,
            'num' => $num,
        ]);
    }

    /**
     * 查看分类（标签）列表API
     *
     * @param string $type 	数据集类型，可包括： IMAGE_CLASSIFICATION, OBJECT_DETECTION, IMAGE_SEGMENTATION, SOUND_CLASSIFICATION, TEXT_CLASSIFICATION, TEXT_CLASSIFICATION_MUL
    分别对应：图像分类、物体检测、图像分割、声音分类、文本分类（单标签）、文本分类（多标签）
     * @param int $datasetId 数据集ID
     * @param int $start 起始序号，默认0
     * @param int $num 数量，默认20，最多100
     * @link https://ai.baidu.com/ai-doc/EASYDL/rkbh90ak5#%E6%9F%A5%E7%9C%8B%E6%95%B0%E6%8D%AE%E9%9B%86%E5%88%97%E8%A1%A8api
     *
     * @return \Cblink\BaiduCloudAiSdk\ApiDto
     */
    public function getEasyDLLabelListApi($type, $datasetId, $start, $num)
    {
        return new ApiDto('rpc/2.0/easydl/label/list', [
            'type' => $type,
            'datasetId' => $datasetId,
            'start' => $start,
            'num' => $num,
        ]);
    }

    /**
     * 分类（标签）删除API
     *
     * @param string $type 	数据集类型，可包括： IMAGE_CLASSIFICATION, OBJECT_DETECTION, IMAGE_SEGMENTATION, SOUND_CLASSIFICATION, TEXT_CLASSIFICATION, TEXT_CLASSIFICATION_MUL
    分别对应：图像分类、物体检测、图像分割、声音分类、文本分类（单标签）、文本分类（多标签）
     * @param int $datasetId 数据集ID
     * @link https://ai.baidu.com/ai-doc/EASYDL/Lk522l768#%E6%95%B0%E6%8D%AE%E9%9B%86%E5%88%A0%E9%99%A4api
     *
     * @return \Cblink\BaiduCloudAiSdk\ApiDto
     */
    public function getEasyDLDeleteLabelApi($type, $datasetId)
    {
        return new ApiDto('rpc/2.0/easydl/label/delete', [
            'type' => $type,
            'datasetId' => $datasetId,
        ]);
    }

    /**
     * 添加数据API
     *
     * @param string $type 	数据集类型，可包括： IMAGE_CLASSIFICATION, OBJECT_DETECTION, IMAGE_SEGMENTATION, SOUND_CLASSIFICATION, TEXT_CLASSIFICATION, TEXT_CLASSIFICATION_MUL
    * 分别对应：图像分类、物体检测、图像分割、声音分类、文本分类（单标签）、文本分类（多标签）
     * @param int $datasetId 数据集ID
     * @param string $entityContent type为 IMAGE_CLASSIFICATION/OBJECT_DETECTION/IMAGE_SEGMENTATION/SOUND_CLASSIFICATION时，填入图片/声音的base64编码；type为TEXT_CLASSIFICATION时，填入utf-8编码的文本。内容限制为：图像分类base64前10M；物体检测base64前10M；图像分割base64前10M；声音分类base64前4M，声音时长1~15秒；文本分类10000个汉字
     * @param string $entityName 文件
     * @param array  $labels = [  标签/分类数据
     *      label_name 标签/分类名称（由数字、字母、中划线、下划线组成），长度限制20B
     *      left 物体检测时需给出，标注框左上角到图片左边界的距离(像素)
     *      top 物体检测时需给出，标注框左上角到图片上边界的距离(像素)
     *      width 物体检测时需给出，标注框的宽度(像素)
     *      height 物体检测时需给出，标注框的高度(像素)
     * ]
     * @param bool $appendLabel 确定添加标签/分类的行为：追加(true)、替换(false)。默认为追加(true)。
     *
     * @return \Cblink\BaiduCloudAiSdk\ApiDto
     * @link https://ai.baidu.com/ai-doc/EASYDL/Lk522l768#%E6%B7%BB%E5%8A%A0%E6%95%B0%E6%8D%AEapi
     *
     */
    public function getEasyDLAddDataSetApi($type, $datasetId, $entityContent, $entityName, $labels, $appendLabel = true)
    {
        return new ApiDto('rpc/2.0/easydl/dataset/addentity', [
            'type' => $type,
            'datasetId' => $datasetId,
            'appendLabel' => $appendLabel,
            'entityContent' => $entityContent,
            'entityName' => $entityName,
            'labels' => $labels,
        ]);
    }

    /**
     * 数据集删除API
     *
     * @param string $type 	数据集类型，可包括： IMAGE_CLASSIFICATION, OBJECT_DETECTION, IMAGE_SEGMENTATION, SOUND_CLASSIFICATION, TEXT_CLASSIFICATION, TEXT_CLASSIFICATION_MUL
    分别对应：图像分类、物体检测、图像分割、声音分类、文本分类（单标签）、文本分类（多标签）
     * @param int $datasetId 数据集ID
     * @link https://ai.baidu.com/ai-doc/EASYDL/rkbh90ak5#%E6%9F%A5%E7%9C%8B%E6%95%B0%E6%8D%AE%E9%9B%86%E5%88%97%E8%A1%A8api
     *
     * @return \Cblink\BaiduCloudAiSdk\ApiDto
     */
    public function getEasyDLDeleteDataSetApi($type, $datasetId)
    {
        return new ApiDto('rpc/2.0/easydl/dataset/delete', [
            'type' => $type,
            'datasetId' => $datasetId,
        ]);
    }
}