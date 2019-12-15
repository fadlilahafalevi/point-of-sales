<!DOCTYPE html>
<head>
    <title>INVOICE</title>
    <link rel="stylesheet" href="/point-of-sales/assets/css/laporan.css">
</head>
<body onload="window.print()">
    <div id="laporan">
        <table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
        </table>

        <table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr></tr>
        </table>

        <?php 
            $detail = $data->row_array();
        ?>
        <table border="0" align="center" style="width:700px;border:none;">
            <tr>
                <th style="text-align:left;">No Faktur</th>
                <th style="text-align:left;">: <?php echo $detail['jual_nofak'];?></th>
                <th style="text-align:left;">Total</th>
                <th style="text-align:left;">: <?php echo 'Rp '.number_format($detail['jual_total']).',-';?></th>
            </tr>
            <tr>
                <th style="text-align:left;">Tanggal</th>
                <th style="text-align:left;">: <?php echo $detail['jual_tanggal'];?></th>
                <th style="text-align:left;">Tunai</th>
                <th style="text-align:left;">: <?php echo 'Rp '.number_format($detail['jual_jml_uang']).',-';?></th>
            </tr>
            <tr>
                <th style="text-align:left;">Keterangan</th>
                <th style="text-align:left;">: <?php echo $detail['jual_keterangan'];?></th>
                <th style="text-align:left;">Kembalian</th>
                <th style="text-align:left;">: <?php echo 'Rp '.number_format($detail['jual_kembalian']).',-';?></th>
            </tr>
        </table>

        <table border="1" align="center" style="width:700px;margin-bottom:20px;">
            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga Jual</th>
                    <th>Qty</th>
                    <th>Diskon</th>
                    <th>SubTotal</th>
                </tr>
            </thead>

            <tbody>
            <?php 
            $no=0;
                foreach ($data->result_array() as $result) {
                    $no++;
            ?>
                <tr>
                    <td style="text-align:center;"><?php echo $no;?></td>
                    <td style="text-align:left;"><?php echo $result['d_jual_barang_nama'];?></td>
                    <td style="text-align:center;"><?php echo$result['d_jual_barang_satuan'];?></td>
                    <td style="text-align:right;"><?php echo 'Rp '.number_format($result['d_jual_barang_harjul']);?></td>
                    <td style="text-align:center;"><?php echo $result['d_jual_qty'];?></td>
                    <td style="text-align:right;"><?php echo 'Rp '.number_format($result['d_jual_diskon']);?></td>
                    <td style="text-align:right;"><?php echo 'Rp '.number_format($result['d_jual_total']);?></td>
                </tr>
            <?php }?>
            </tbody>

            <tfoot>

                <tr>
                    <td colspan="6" style="text-align:center;"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp '.number_format($detail['jual_total']);?></b></td>
                </tr>
            </tfoot>
        </table>  

        <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>

        <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Jakarta, <?php echo date('d-M-Y')?></td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>
           
            <tr>
            <td><br/><br/><br/><br/></td>
            </tr>    
            <tr>
                <td align="right">( <?php if($this->session->userdata('akses') == '1'){echo 'Admin';} else {echo 'Kasir';} ?> )</td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
        </table>

        <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br/><br/></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>
    </div>
</body>
</html>