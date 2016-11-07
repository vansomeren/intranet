<?php namespace App\Http\Requests;
/**
 * Class CreateAnnouncementRequest
 * @package App\Http\Requests
 */
class CreateAnnouncementRequest extends Request {

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
        return [

            'title' => 'max:255|required',
            'message' => 'max:4096|required'

        ];
    }

}
