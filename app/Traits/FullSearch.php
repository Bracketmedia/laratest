<?php
namespace App\Traits;

trait FullSearch
{
    public function scopeFullSearch($query, $search)
    {
        if (!empty($search)) {
            while (strpos($search, "  ") !== false) {
                $search = str_replace("  ", " ", $search);
            }
            $aSearch = explode(" ", $search);
            foreach ($aSearch as $value) {
                $query->where(function ($q) use ($value) {
                    foreach ($this->fillable as $field) {
                        if (substr($field, -3, 3) == '_id') {
                            $method = substr($field, 0, strlen($field) - 3);
                            $method = str_replace("_", " ", $method);
                            $method = ucwords($method);
                            $method = str_replace(" ", "", $method);
                            if ($method != 'Parent') {
                                $class = $method;
                                $class = "App\\{$class}";
                                $method[0] = strtolower($method[0]);
                                $q->orWhereHas($method, function ($q) use ($value, $class) {
                                    if ($value) {
                                        $objClass = new $class();
                                        $arrFields = $objClass->getFillname();
                                        $first = true;
                                        foreach ($arrFields as $field) {
                                            if ($first) {
                                                $q->where($field, 'LIKE', "%{$value}%");
                                                $first = false;
                                            } else {
                                                $q->orWhere($field, 'LIKE', "%{$value}%");
                                            }
                                        }
                                    }
                                });
                            }
                        } else {
                            $q->orWhere($field, 'like', "%{$value}%");
                        }
                    }
                });
            }
        }
        return $query;
    }

    public function getFillname()
    {
        return $this->fillname;
    }
}
