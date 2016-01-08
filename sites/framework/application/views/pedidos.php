<?php if (isset($rows)) : ?>
    <p style="color:red; font-weight:bold; font-size:15px;">Para apagar um pedido clique no titulo</p>
    <?php foreach($rows as $r) : ?> 
    <h1><?php  echo anchor("site/delete/$r->id", $r->title); ?></h1>
    <div><?php echo $r->content; ?></div>
<?php endforeach; ?><?php else : ?> <h2>Sem dados</h2><?php endif; ?>