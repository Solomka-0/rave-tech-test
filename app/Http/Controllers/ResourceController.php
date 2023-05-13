<?php

namespace App\Http\Controllers;


use App\Models\Resource;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;

class ResourceController extends Controller
{
    public function index(string $token)
    {
        $resource = Resource::find(intval($token, 36));
        return $resource ?
            redirect($resource->src)
            : 'b';
    }

    public function create(Request $request)
    {
        $token = csrf_token();

        $input = $request->all();

        $regex = "/^https?:\\/\\/(?:www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/";

        $input = $request->all();
        $request->validate([
            'resource' => 'required|regex:'.$regex
        ]);

        $resource = Resource::create(['src' => $input['resource']]);
        $token = base_convert($resource->id, 10, 36);

        $shortLink = request()->server->get('HTTP_ORIGIN') . '/'. $token;

        return response()->json([
            'resource' => $input['resource'],
            'shortLink' => $shortLink
        ]);
    }
}
