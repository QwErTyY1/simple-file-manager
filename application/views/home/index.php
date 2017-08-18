<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="wrapper">

    <header class="header">
        Visitor's path
    </header><!-- .header-->

    <div class="middle">

        <div class="container">
            <main class="content">

                <div class="get_content">
                    <table class="table table-container" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Directory name</th>
                            <button class='wdaBack'>/</button>


                        </tr>
                        </thead>

                            <?php foreach ($user_content as $item => $val):?>
                        <tbody class="table_content">

                                <td><?=$item." => ".$val ?></td>

                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>


            </main><!-- .content -->

        </div><!-- .container-->



    </div><!-- .middle-->

</div><!-- .wrapper -->

<div style="display: none;">
    <div class="box-modal" id="seeFileModal">
        <div class="box-modal_close arcticmodal-close">close</div>
            <div class="contentModal" style="width: auto"></div>

    </div>
</div>

