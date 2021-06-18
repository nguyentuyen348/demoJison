<?php


class DataProduct
{
        public static $path='product.json';
        public static $productList=[];

    public static function loadData()
    {
        $dataJson=file_get_contents(self::$path);
        $data=json_decode($dataJson);
        return self::convertProduct($data);
    }

    public static function saveData($data)
    {
        $dataJson=json_encode($data);
        file_put_contents(self::$path,$dataJson);
    }

    public static function convertProduct($data)
    {
        $productList=[];
        foreach ($data as $item){
            $product=new Product($item->sort,$item->name,$item->price,$item->img);
            array_push($productList,$product);
        }
        return $productList;
    }

    public static function addProduct($product)
    {
            $productList= self::loadData();
            array_push($productList, $product);
            self::saveData($productList);

    }
    public static function checkadd($product){
        $product= self::loadData();
        foreach ($product as $item)
        {
            if( $product->sort==$item->sort &&
                $product->name==$item->name&&
                $product->price==$item->price&&
                $product->img==$item->img){
                return true;
            }
        }
        return false;
    }


    public static function delete($index)
    {
       /* self::$productList[]= DataProduct::loadData();
        array_splice(self::$productList[], $index, 1);
        DataProduct::saveData($data);*/






    }

  /*  public static function update($index,$product)
    {
        self::$producList = DataProduct::loadData();
        self::$producList[$index]->lastName = $product->getSort();
        self::$producList[$index]->firstName = $product->getName();
        self::$producList[$index]->dateOfBirth = $product->getPrice();
        self::$producList[$index]->address = $product->getImg();
        DataProduct::saveData($data);
    }*/
}