<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $regex = "/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})?$/";
        return [
            'country' => 'required|min:1|max:3',
            'state' => 'required|min:1|max:4',
            'city' => 'required|min:1|max:7',
            'title' => 'required|min:3|max:150',
            'subtitle' => 'required|min:5|max:180',
            'body' => 'required|min:8|max:10000',
            'type' => 'required|min:1|max:2',
            'file' => 'mimes:jpeg,jpg,png,gif,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',           
            'urlf' => ['required_without:file','nullable','regex:/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})?$/'],

            /*'urlf' => ['required_without:file','nullable','regex:/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})?$/'], funciona ok */ 
            //'file' => 'required_without:urlf','mimes:jpeg,jpg,png,gif,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            //'urlf' => array("required_unless:file,null", "regex:".$regex)
            //'class_subjects' => ['required', 'regex:/[0-9]([0-9]|-(?!-))+/'],
            //'urlf' => 'regex:/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})?$/','required_without:file'
            /*'urlf' =>  array('required_without:file','regex:/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})?$/')*/

            //'name' => ['required', 'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/']
            //'last_name.*' => 'required_unless:given_name.*,'
            //'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'];
        ];
    }
}
