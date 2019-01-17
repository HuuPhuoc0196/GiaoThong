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
            $pattern = $val['pattern'];
            preg_match_all($pattern, $content, $datalist);
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
                
                $urlImage = $datalist[2][$key];
                
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
                    'title' => trim($datalist[3][$key]),
                    'summary' => trim((empty($datalist[4][$key])?$datalist[3][$key]:$datalist[4][$key])),
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
        $source = "http://www.tapchigiaothong.vn";
        $url = "https://news.zing.vn/giao-thong.html";
        $content = file_get_contents($url);
        $pattern = '#<article.*href="(.*)".*src="(.*)".*<a.*>(.*)<.*summary">(.*)<#imsU';
        preg_match_all($pattern, $content, $datalist);
        echo '<pre>';
        print_r($datalist);
        echo '</pre>';
    }
}