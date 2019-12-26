<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3 top-margin">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/gambar-sayur') . "/" . $sayuran['gambar_sayur']; ?>"
                            class="card-img p-4" alt="..." height="350px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">
                                <?= $sayuran['jenis_sayur']; ?>/<?= $sayuran['nama_sayur'] ?>/<?= $sayuran['deskripsi'] ?>
                            </p>
                            <hr>
                            <p style="font-size: 30px; color: #d71149; font-weight: bold" class="card-text">
                                Rp.<?= number_format($sayuran['harga']); ?> (/<?= $sayuran['satuan'] . ")" ?></p>
                            <li class="list-group-item list-group-item-warning">Nikmati tawaran terbaik dengan bertemu
                                petani
                                langsung</li>

                            <input type="number" class="form-control mt-2 mb-4 col-2" value="1">

                            <div class="row warna" style="margin-top: -15px">
                                <div class="col-md mb-1">

                                    <?php echo anchor('transaksi/tambah_keranjang/' . $sayuran['id'], '<button type="submit" class="btn btn-block">Tambahkan ke
                                            keranjang</button></a>') ?>

                                </div>
                                <div class="col-md">
                                    <a href="javascript:;" data-friend="<?= $sayuran['id_petani'] ?>">
                                        <button type="button" class="btn btn-block">Chat
                                            Petani</button></a><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $id_sayur = $sayuran['id_petani'];
        $queryTampilPetani = "SELECT *, `user`.`id` AS `id_user` 
                                FROM `user` JOIN `sayuran` 
                                ON `user`.`id` = `sayuran`.`id_petani`
                                WHERE `user`.`id` = $id_sayur";

        $petani = $this->db->query($queryTampilPetani)->row_array();
        // var_dump($petani);
        // die;
        ?>
        <div class="col-lg-3 ml-3 top-margin">
            <h5 class="card-title text-center">PETANI</h5>
            <div class="kotak text-center">
                <img class="" src="<?= base_url('assets/img/profile/') . $petani['image']; ?>" width="80" height="80">

            </div>
            <p class="text-center"><?= $petani['nama'] ?></p>
            <hr style="width: 100px; margin-top: -10px;">
            <div class="row mt-2">
                <div class="col-md-1">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="col">
                    <p class="card-text">
                        <?= $petani['alamat'] ?></p>
                </div>
            </div>
            <hr>
            <h5 class="card-title mt-3 text-center">PENGIRIMAN</h5>
            <div class="row text-center">
                <div class="col">
                    <p>COD</p>
                </div>
                <div class="col">
                    <p><i class="far fa-check-circle"></i></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <p>JNE</p>
                </div>
                <div class="col">
                    <p>
                        <i class="far fa-times-circle"></i>
                    </p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <p>Grab</p>
                </div>
                <div class="col">
                    <p>
                        <i class="far fa-times-circle"></i>
                    </p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <p>Gojek</p>
                </div>
                <div class="col">
                    <p>
                        <i class="far fa-times-circle"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<section id="viewSayur" class="viewSayur mt-3">
    <div class="container-fluid p-4">
        <div class="row">
            <!-- menampilkan berbagai macam sayuran -->
            <?php foreach ($tampilSayur as $sayur) : ?>
            <div class="col-sm-2 textStyle">
                <a href="<?= base_url() ?>transaksi/detailSayur/<?= $sayur['id']; ?>">
                    <div class="card mb-3 coba">
                        <img src="<?= base_url('assets/img/gambar-sayur') . "/" . $sayur['gambar_sayur']; ?>"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $sayur['deskripsi'] ?> </p>
                            <p style="color: #d71149;">Rp. <?= number_format($sayur['harga']); ?>
                                (/<?= $sayur['satuan'] . ")" ?></p>
                            <p class="card-text"><small class="text-muted">ditambahkan pada

                                    <?= date('d F Y', $sayur['tanggal_rilis']); ?></small></p>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- TEMPLATE -->
<div id="wgt-container-template" style="display: none">
    <div class="msg-wgt-container">
        <div class="msg-wgt-header">
            <a href="javascript:;" class="online"></a>
            <a href="javascript:;" class="name"></a>
            <a href="javascript:;" class="close">x</a>
        </div>
        <div class="msg-wgt-message-container">
            <table width="100%" class="msg-wgt-message-list">
            </table>
        </div>
        <div class="msg-wgt-message-form">
            <textarea name="message" placeholder="Type your message. Press Shift + Enter for newline"></textarea>
        </div>
    </div>
</div>

<script type="text/x-template" id="msg-template" style="display: none">
    <tbody>
        <tr class="msg-wgt-message-list-header">
            <td class="name"></td>
            <td class="time"></td>
        </tr>
        <tr class="msg-wgt-message-list-body">
            <td colspan="2"></td>
        </tr>
        <tr class="msg-wgt-message-list-separator"><td colspan="3"></td></tr>
    </tbody>
</script>

<!-- mulai atraksi chat -->
<script type="text/javascript">
jQuery(document).ready(function($) {
    var chatPosition = [
        false, // 1
        false, // 2
        false, // 3
        false, // 4
        false, // 5
        false, // 6
        false, // 7
        false, // 8
        false, // 9
        false // 10
    ];
    // New chat
    $(document).on('click', 'a[data-friend]', function(e) {
        var $data = $(this).data();
        if ($data.friend !== undefined && chatPosition.indexOf($data.friend) < 0) {
            var posRight = 0;
            var position;
            for(var i in chatPosition) {
                if (chatPosition[i] == false) {
                    posRight = (i * 270) + 20;
                    chatPosition[i] = $data.friend;
                    position = i;
                    break;
                }
            }
            var tpl = $('#wgt-container-template').html();
            var tplBody = $('<div/>').append(tpl);
            tplBody.find('.msg-wgt-container').addClass('msg-wgt-active');
            tplBody.find('.msg-wgt-container').css('right', posRight + 'px');
            tplBody.find('.msg-wgt-container').attr('data-chat-position', position);
            tplBody.find('.msg-wgt-container').attr('data-chat-with', $data.friend);
            $('body').append(tplBody.html());
            initializeChat();
        }
    });
    // Minimize Maximize
    $(document).on('click', '.msg-wgt-header > a.name', function() {
        var parent = $(this).parent().parent();
        if (parent.hasClass('minimize')) {
            parent.removeClass('minimize')
        } else {
            parent.addClass('minimize');
        }
    });
    // Close
    $(document).on('click', '.msg-wgt-header > a.close', function() {
        var parent = $(this).parent().parent();
        var $data = parent.data();
        parent.remove();
        chatPosition[$data.chatPosition] = false;
        setTimeout(function() {
            initializeChat();
        }, 1000)
    });
    var chatInterval = [];
    var initializeChat = function() {
        $.each(chatInterval, function(index, val) {
            clearInterval(chatInterval[index]);   
        });
        $('.msg-wgt-active').each(function(index, el) {
            var $data = $(this).data();
            var $that = $(this);
            var $container = $that.find('.msg-wgt-message-container');
            chatInterval.push(setInterval(function() {
                var oldscrollHeight = $container[0].scrollHeight;
                var oldLength = 0;
                $.post('<?= site_url('chat/getChats') ?>', {chatWith: $data.chatWith}, function(data, textStatus, xhr) {
                    $that.find('a.name').text(data.name);
                    // from last
                    var chatLength = data.chats.length;
                    var newIndex = data.chats.length;
                    $.each(data.chats, function(index, el) {
                        newIndex--;
                        var val = data.chats[newIndex];
                        var tpl = $('#msg-template').html();
                        var tplBody = $('<div/>').append(tpl);
                        var id = (val.chat_id +'_'+ val.send_by +'_'+ val.send_to).toString();
                        
                        if ($that.find('#'+ id).length == 0) {
                            tplBody.find('tbody').attr('id', id); // set class
                            tplBody.find('td.name').text(val.nama); // set name
                            tplBody.find('td.time').text(val.time); // set time
                            tplBody.find('.msg-wgt-message-list-body > td').html(nl2br(val.message)); // set message
                            $that.find('.msg-wgt-message-list').append(tplBody.html()); // append message
                            //Auto-scroll
                            var newscrollHeight = $container[0].scrollHeight - 20; //Scroll height after the request
                            if (newIndex === 0) {
                                $container.animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }
                        }
                    });
                });
            }, 1000));
            $that.find('textarea').on('keydown', function(e) {
                var $textArea = $(this);
                if (e.keyCode === 13 && e.shiftKey === false) {
                    $.post('<?= site_url('chat/sendMessage') ?>', {message: $textArea.val(), chatWith: $data.chatWith}, function(data, textStatus, xhr) {
                    });
                    $textArea.val(''); // clear input
                    e.preventDefault(); // stop 
                    return false;
                }
            });
        });
    }
    var nl2br = function(str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>'; // Adjust comment to avoid issue on phpjs.org display
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }
    // on load
    initializeChat();
});
</script>