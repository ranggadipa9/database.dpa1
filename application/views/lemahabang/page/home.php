
<!--#content -->
<title>
    <?php echo $title; ?>
</title>
<!-- end #content -->
</body>



<div id="content">
          <div class="box">
            <h2>Selamat Datang !</h2>
  <p>&nbsp;</p>
    <table width="325" border="0" cellpadding="2" cellspacing="1" class="display" id="tbl_sipeg">
            <tr>
                <td width="104">Pengguna</td>
                <td width="8">:</td>
                <td width="197"><?php echo $this->session->userdata('pengguna'); ?></td>
      </tr>
            <tr>
                <td width="104">Bagian</td>
                <td width="8">:</td>
                <td><?php echo $this->session->userdata('seksi'); ?> </td>
            </tr>
  </table>
    <p>&nbsp;</p>
<!-- end #content -->
</div>
        </div>
        
		<div class="clear"></div>
    </div>
</div>