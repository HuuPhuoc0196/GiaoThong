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
                if($this->m_news->findTitle(html_entity_decode(trim((empty(trim($datalist[2][$key]))?$datalist[4][$key]:$datalist[2][$key]))))){
                    continue;
                }
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
                    'title' => html_entity_decode(trim((empty(trim($datalist[2][$key]))?$datalist[4][$key]:$datalist[2][$key]))),
                    'summary' => html_entity_decode(trim((empty(trim($datalist[4][$key]))?$datalist[2][$key]:$datalist[4][$key]))),
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
         $urlDetail = "https://vietnammoi.vn/nam-tai-xe-keu-cuu-that-thanh-trong-xe-hop-xoay-ngang-bi-xe-tai-day-hon-20m-tren-quoc-lo-1-20190309155539631.htm";
         $contentDetail = file_get_contents($urlDetail);
         $patternDetail = '#class="col685 left">.*class="icon icon-time"></i>(.*)</span>.*data-article-target>(.*)<div class="clearfix">.*class="clear">.*class="author".*>(.*)</p>#imsU';
         preg_match($patternDetail, $contentDetail, $datadetail);
         
         echo '<pre>';
         print_r($datadetail[2]);
         echo '</pre>';
    }
    
    public function test(){
        $summary = '<p><strong style="color:#333">Tạp chí GTVT </strong> - Ban ATGT tỉnh Gia Lai kiến nghị Tổng cục đường bộ VN giải pháp, xử lý, cải tạo nút giao, để khắc phục nguy cơ mất an toàn giao thông.                    <span></span></p>';    
        $summary = preg_replace('/style=".*"/', "", $summary);
        print_r($summary);die;
    }
}