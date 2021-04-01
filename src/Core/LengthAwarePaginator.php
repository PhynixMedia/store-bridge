<?php

namespace Phynixmedia\Store\Core;

class LengthAwarePaginator {

    private $route;
    private $path_data;
    private $data;

    public function __construct($raw = null, string $route = null, array $path_data = []){

        $this->data = $raw ?? null;
        $this->route = $route;
        $this->path_data = $path_data;
    }

    public function paginate(){

        if(! $this->hasPages()){
            return false;
        }
        return $this;
    }

    public function data(): ?array
    {
        return $this->data->data ?? null;
    }

    public function hasPages(){

        if($this->total() == 0){
            return false;
        }

        if($this->perPage() > $this->total()){

            return false;
        }
        return true;
    }

    public function perPage(): int
    {

        return $this->data->per_page ?? 0;
    }

    public function hasMorePages(){

        if(($this->total() / $this->perPage()) > 2){

            return false;
        }
        return true;
    }

    public function onFirstPage()
    {
        if($this->data->first_page_url ?? null){
            return true;
        }
        return false;
    }

    public function onLastPage()
    {
        if($this->data->last_page_url ?? null){
            return true;
        }
        return false;
    }

    public function firstPage()
    {

        return $this->data->first_page ?? null;
    }

    public function lastPage()
    {

        return $this->data->last_page ?? null;
    }

    public function previousPageUrl(): ?string
    {

        return self::get_url_page($this->data->prev_page_url ?? null);
    }

    public function url(int $page): ?string
    {
        return $this->create_path().'?page='.$page;
    }

    public function currentPage(): int
    {

        return $this->data->current_page ?? 0;
    }

    public function nextPageUrl(): ?string
    {

        return self::get_url_page($this->data->next_page_url ?? null);
    }

    public function total(): int
    {

        return $this->data->total ?? 0;
    }

    public function to(): int
    {

        return $this->data->to ?? 0;
    }

    public function from(): int
    {
        
        return $this->data->from ?? 0;
    }

    private function get_url_page(string $url = null){
        
        if( $url )
        {
            $data_array = explode('?', $url);

            return $this->create_path() .'?' . end($data_array);
        }

        return null;
    }

    private function create_path(){

        if( $this->route && $this->path_data)
        {
            return route($this->route, $this->path_data);
        }

        if(! $this->route ){
            return false;
        }

        return route( $this->route );
    }
}

// {#505 ▼
//     +"current_page": 1
//     +"data": array:10 [▶]
//     +"first_page_url": "https://app.feramy.com/api/v4/products/category/list/items?page=1"
//     +"from": 1
//     +"last_page": 2
//     +"last_page_url": "https://app.feramy.com/api/v4/products/category/list/items?page=2"
//     +"next_page_url": "https://app.feramy.com/api/v4/products/category/list/items?page=2"
//     +"path": "https://app.feramy.com/api/v4/products/category/list/items"
//     +"per_page": 10
//     +"prev_page_url": null
//     +"to": 10
//     +"total": 19
//   }
  