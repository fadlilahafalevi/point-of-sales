          <?php 
            error_reporting(0);
            $barang_nama   = $barang['barang_nama'];
            $barang_harpok = $barang['barang_harpok'];
            $barang_harjul = $barang['barang_harjul'];
            $barang_satuan = $barang['barang_satuan'];
          ?>

                    <div class="form-group row">
                      <label for="barang_nama" class="col-sm-2 col-form-label"><b>Nama Barang</b></label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="barang_nama" name="barang_nama" placeholder="Nama Barang" readonly="readonly" value="<?=$barang_nama?>">
                      </div>

                      <label for="barang_harjul" class="col-sm-2 col-form-label"><b>Harga Pokok</b></label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="barang_harpok" name="barang_harpok" placeholder="Harga Pokok" readonly="readonly" value="<?=$barang_harpok?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="barang_satuan" class="col-sm-2 col-form-label"><b>Satuan</b></label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="barang_satuan" name="barang_satuan" placeholder="Satuan" readonly="readonly" value="<?=$barang_satuan?>">
                      </div>

                      <label for="barang_diskon" class="col-sm-2 col-form-label"><b>Harga Jual</b></label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="barang_harjul" name="barang_harjul" placeholder="Harga Pokok" readonly="readonly" value="<?=$barang_harjul?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="barang_jumlah" class="col-sm-2 col-form-label"><b>Jumlah</b></label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" id="barang_jumlah" name="barang_jumlah" placeholder="Jumlah" >
                      </div>

                      <label for="btn_input" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-2">
                        <button class="btn btn-success">INPUT</button>
                      </div>
                    </div>