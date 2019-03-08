<?php

class Service extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_news');
        $this->load->model('m_newsDetail');
        $this->load->model('m_dom');
    }

    public function insert()
    {
        $count = 0;
        $data_dom = $this->m_dom->get();
        foreach ($data_dom as $val) {
            $source = $val['source'];
            $url = $val['url'];
            $content = file_get_contents($url);
            $patternContent = $val['pattern_content'];
            $pattern = $val['pattern'];
            preg_match($patternContent, $content, $dataContentlist);
            $dataContentlist = implode("|",$dataContentlist);
            preg_match_all($pattern, $dataContentlist, $datalist);
            foreach ($datalist[1] as $key => $value) {
                if (! isset($datalist[1][$key]))
                    continue;
                if (! isset($datalist[2][$key]))
                    continue;
                if (! isset($datalist[3][$key]))
                    continue;
                if (! isset($datalist[4][$key]))
                    continue;
                
                $checkLink = strpos($datalist[1][$key], $source);
                if ($checkLink !== false) {
                    $urlDetail = $datalist[1][$key];
                } else {
                    $urlDetail = $source . $datalist[1][$key];
                }
                
                $urlImage = $datalist[3][$key];
                
                $contentDetail = file_get_contents($urlDetail);
                $patternDetail = $val['pattern_detail'];
                preg_match($patternDetail, $contentDetail, $datadetail);
                if (! isset($datadetail[1]))
                    continue;
                if (! isset($datadetail[2]))
                    continue;
                if (! isset($datadetail[3]))
                    continue;
                    // save hinh
                $filename = basename($urlImage);
                $arrfilename = explode('.', $filename);
                $filename = $arrfilename[0] . '.jpg';
                $image = $arrfilename[0] . '.jpg';
                if (file_exists('public/images/' . $image)) {
                    $image = $arrfilename[0] . $count . '.jpg';
                }
                file_put_contents('public/images/' . $image, file_get_contents($urlImage));
                
                $data = array(
                    'link_detail' => $urlDetail,
                    'image' => $image,
                    'title' => trim((empty(trim($datalist[2][$key]))?$datalist[4][$key]:$datalist[2][$key])),
                    'summary' => trim((empty(trim($datalist[4][$key]))?$datalist[2][$key]:$datalist[4][$key])),
                    'source' => $val['source'],
                    'status' => 0
                );
                $id_news = $this->m_news->insert($data);
                
                $dataDetail = array(
                    'id_news' => $id_news,
                    'time_post' => trim($datadetail[1]),
                    'content_detail' => trim($datadetail[2]),
                    'author' => trim($datadetail[3])
                );
                $this->m_newsDetail->insert($dataDetail);
                
                $count ++;
            }
        }
        echo "Đã Thêm thành công: " . $count . " bản tin";
    }

    public function testdom()
    {
        $source = "https://luatduonggia.vn";
        $url = "https://luatduonggia.vn/tu-van-phap-luat/tu-van-phap-luat-giao-thong/";
        $content = file_get_contents($url);
        $patternContent = '#(?<=class="main-content-category">).*(?<=<div class="bottom-main-content">)#imsU';
        $pattern = '#<article.*<a href="(.*)">(.*)<div.*src="(.*)".*class="entry-content">(.*)<.*</article>#imsU';
        preg_match($patternContent, $content, $dataContentlist);
        $dataContentlist = implode("|",$dataContentlist);
        preg_match_all($pattern,$dataContentlist,$datalist);
        
        
         //echo $dataContentlist;
         echo '<pre>';
         print_r($datalist);
         echo '</pre>';
    }
    public function testdom2()
    {
         $urlDetail = "https://luatduonggia.vn/o-to-xe-may-di-nguoc-chieu-thi-muc-phat-la-bao-nhieu-tien/";
         $contentDetail = file_get_contents($urlDetail);
         $patternDetail = '#id="primary".*class="left-info">(.*)</div>.*<h1 class="entry-title">(.*)</article>(.*)<#imsU';
         preg_match($patternDetail, $contentDetail, $datadetail);
         
         echo '<pre>';
         print_r($datadetail[2]);
         echo '</pre>';
    }
}