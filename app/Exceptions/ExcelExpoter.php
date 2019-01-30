<?php

namespace App\Exceptions;

use Encore\Admin\Grid;
use Encore\Admin\Grid\Exporters\AbstractExporter;
use Maatwebsite\Excel\Facades\Excel;

class ExcelExpoter extends AbstractExporter
{
    protected $head = [];
    protected $body = [];//设置导出列，默认全部
    public function setAttr($head, $body){
        $this->head = $head;
        $this->body = $body;
    }

    public function export()
    {
        Excel::create('Filename', function($excel) {
            $excel->sheet('Sheetname', function($sheet) {
                // 这段逻辑是从表格数据中取出需要导出的字段
                $head = $this->head;
                $body = $this->body;
                $bodyRows = collect($this->getData())->map(function ($item)use($body) {
                    foreach ($body as $keyName){
                        switch ($keyName) {
                            case 'start_time' :
                                $arr[] = date('Y-m-d H:i:s', array_get($item, $keyName));
                                break;
                            case 'start' :
                                $start = array_get($item, $keyName);
                                switch ($start) {
                                    case 1 :
                                        $start = "已发布";
                                        break;
                                    default:
                                        $start = "未发布";
                                        break;
                                }
                                $arr[] = $start;
                                break;
                            case 'address' ://组装多条件
                                $arr[] = array_get($item, 'province').array_get($item, 'city').array_get($item, 'district').array_get($item, 'address');
                                break;
                            case 'province' : break;//过滤掉不处理参数
                            case 'city' : break;//过滤掉不处理参数
                            case 'district' : break;//过滤掉不处理参数
                            default:
                                $arr[] = array_get($item, $keyName);
                                break;
                        }
                    }
                    return $arr;
                });
                $rows = collect([$head])->merge($bodyRows);
                $sheet->rows($rows);
            });
        })->export('csv');//.xls .csv ...
    }
}