<?php function output_article_list($articles) { ?>
  <section id="news">
    <?php foreach($articles as $article) output_article($article); ?>
  </section>
<?php } ?>

// output page header, criar função para ir buscar header e footer usar noutras paginas 