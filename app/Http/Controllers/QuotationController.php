<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quotations/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the fields


        // Get attributes from the request.
        $origin_zip_code = $request->origin_zip_code;
        $destination_zip_code = $request->destination_zip_code;
        $real_weight = $request->real_weight;
        $quantity_volume = $request->quantity_volume;
        $total_value = $request->total_value;
        $global_volume_quantity = $request->global_volume_quantity;

        // Create a collection for store the data from request.
        $request_data = collect();

        // Create the token from Azul Cargo Express.
        // Create HTTP client to Azul Cargo Express.
        $client_azul = new \GuzzleHttp\Client(['base_uri' => 'https://ediapi.onlineapp.com.br']);

        // Send authenthication request to Azul Cargo Express for get token and refresh token.
        $response_azul = $client_azul->request('POST', '/toolkit/api/Autenticacao/AutenticarUsuario' , [
            'headers' => [
                'Content-Type' => 'application/json',
                'Connection' => 'keep-alive',
            ],
            'body' => '{
                "Email": "gabriel.cabral@aguadecoco.com.br",
                "Senha": "Azul@azulcargo@2025"
            }',
            'verify' => false,
        ]);
        $body_response_azul = $response_azul->getBody();
        $json_azul = json_decode($body_response_azul);
        $token_azul = $json_azul->Value;

        // Make request to quotation from Azul Cargo Express
        // Make the send json.
        $send_json = "{";
        $send_json = $send_json."\"Token\": \"$token_azul\",
            \"CEPOrigem\": \"$origin_zip_code\",
            \"CEPDestino\": \"$destination_zip_code\",
            \"PesoReal\": $real_weight,
            \"Volume\": $quantity_volume,
            \"ValorTotal\": $total_value,
            \"TipoEntrega\": \"DOMICILIO\",
            \"Coleta\": true,
            \"Itens\": [";
        // Set an aux to get the count of volumes on the JSON.
        $count = 0;
        for ($i=1; $i < $global_volume_quantity; $i++) {
            if ($request->has("item_quantity_volume$i")) {
                $count++;
                if ($count <= 1) {
                    $item_quantity_volume = $request->input("item_quantity_volume$i");
                    $weight = $request->input("weight$i");
                    $height = $request->input("height$i");
                    $length = $request->input("length$i");
                    $width = $request->input("width$i");
                    $send_json = $send_json."{
                        \"Volume\": $item_quantity_volume,
                        \"Peso\": $weight,
                        \"Altura\": $height,
                        \"Comprimento\": $length,
                        \"Largura\": $width
                    }";
                } else {
                    $item_quantity_volume = $request->input("item_quantity_volume$i");
                    $weight = $request->input("weight$i");
                    $height = $request->input("height$i");
                    $length = $request->input("length$i");
                    $width = $request->input("width$i");
                    $send_json = $send_json.",{
                        \"Volume\": $item_quantity_volume,
                        \"Peso\": $weight,
                        \"Altura\": $height,
                        \"Comprimento\": $length,
                        \"Largura\": $width
                    }";
                }
            }
        }
        $send_json = $send_json."
            ]
        }";
        Log::info("Global Volume Quantity: ".$global_volume_quantity);
        Log::info("JSON: ".$send_json);

        // Send authenthication request to Azul Cargo Express for get one or more quotation.
        $response_azul_quotation = $client_azul->request('POST', '/toolkit/api/Cotacao/Enviar' , [
            'headers' => [
                'Content-Type' => 'application/json',
                'Connection' => 'keep-alive',
            ],
            'body' => $send_json,
            'verify' => false,
        ]);
        $body_response_azul_quotation = $response_azul_quotation->getBody();
        $json_azul_quotation = json_decode($body_response_azul_quotation);
        $quotations = collect();

        foreach ($json_azul_quotation->Value as $quotation) {
            $service_name = $quotation->NomeServico;
            $taxed_weight = $quotation->PesoTaxado;
            $deadline = $quotation->Prazo;
            $total = $quotation->Total;
            $freight = $quotation->Frete;
            $new_quotation = [
                'service_name' => $service_name,
                'taxed_weight' => $taxed_weight,
                'deadline' => $deadline,
                'total' => $total,
                'freight' => $freight,
            ];
            $quotations->push($new_quotation);
        }

        // Return result view
        return view('quotations.show', ['quotations' => $quotations]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
