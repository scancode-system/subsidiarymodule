<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Pdf\Repositories\PdfLayoutRepository;

class InsertPdfLayoutsRecordsSubsidiary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        PdfLayoutRepository::create(['title' => 'Filiais', 'description' => 'O Pedido é agrupado pelas filiais, cada um com seu cabeçalho rodapé e item separadamente.', 'path' => 'subsidiary::pdf.order']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        PdfLayoutRepository::deleteByTitle('Filiais');
    }
}
