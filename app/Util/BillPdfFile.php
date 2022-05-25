<?php

namespace App\Util;

use App\Interfaces\BillFile;
use App\Models\Order;
use Illuminate\Http\Request;

class BillPdfFile implements BillFile
{

    public function generate($id,Request $request)

    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($this->convert_data_to_html($id));    
        return $pdf->download('factura.pdf');
    }
    public function convert_data_to_html($id)
    {
        $data= Order::where("id", $id)->get();
        $order = $data[0];
        $items = $order->items()->get();
        $user = $order->user()->get();
        $output = '
        <h1 align="center">GG NO TEAM   </h1>
        <h2> Tu orden</h2>
        <h2> ID:'.$order->getId().'</h2>
        <h2>'.$user[0]->getName().'</h2>
        <table width="100%" style="border-collapse:collapse;border:0px;">
            <tr>
                <th style="border:1px solid;padding:12px;" width=20%>Juego</th>
                <th style="border:1px solid;padding:12px;" width=20%>Desarrollador</th>
                <th style="border:1px solid;padding:12px;" width=20%>precio</th>
                <th style="border:1px solid;padding:12px;" width=20%>cantidad</th>
                <th style="border:1px solid;padding:12px;" width=20%>Subtotal</th>
            </tr>';
        
            foreach ($items as $item) {
                
                $game = $item->game()->get();
                $output.='
                        <tr>
                            <td>'.$game[0]->getName().'</td>
                            <td>'.$game[0]->getDeveloper().'</td>
                            <td>'.$game[0]->getprice().'</td>
                            <td>'.$item->getQuantity().'</td>
                            <td>'.$item->getPrice().'</td>
                        </tr>';
                
                    
            }
        
        $output.='</table>';
        $output.='<h1>Total</h1>'.$order->getTotal();
        
        return $output;
    }
}