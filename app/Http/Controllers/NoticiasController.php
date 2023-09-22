<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use jcobhams\NewsApi\NewsApi;

class NoticiasController extends Controller
{
    public function obterPrincipaisManchetes(Request $request, $country)
{
    // Chave de API
    $apiKey = '38b9068db4764f6c97450f064ad99290';

    // Construa a URL da API
    $url = "https://newsapi.org/v2/top-headlines?country={$country}&apiKey={$apiKey}";

    // Faça uma solicitação GET para a API
    $response = Http::get($url);

    // Verifique se a solicitação foi bem-sucedida
    if ($response->successful()) {
        $manchetes = $response->json();
        return response()->json($manchetes);
    } else {
        // Lidar com erros, por exemplo:
        return response()->json(['error' => 'Erro ao obter manchetes'], 500);
    }
}
    
    


    public function obterNoticiasPorCategoria(Request $request, $category)
    {
        // Configure a biblioteca NewsApi com sua chave de API
        $apiKey = '38b9068db4764f6c97450f064ad99290';
        $newsapi = new NewsApi($apiKey);

        // Obtenha notícias com base na categoria fornecida
        $noticias = $newsapi->getTopHeadlines('', '', '', $category, 10, 1);

        // Retorne as notícias como JSON ou processe-as conforme necessário
        return response()->json($noticias);
    }

}
