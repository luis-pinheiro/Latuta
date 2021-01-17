<div class="navbar-fixed">
  <nav role="navigation" class="pink">
    <div class="nav-wrapper">

        <?php get_template_part( 'components/site-logo/site-logo' ); ?>

      <?php
      if ( has_nav_menu( 'primary' ) ) :
        wp_nav_menu( [
            'theme_location' => 'primary',
            'menu_class'     => 'nav right hide-on-med-and-down'
        ] );
      endif;
      ?>
      <?php
      if ( has_nav_menu( 'primary' ) ) :
        wp_nav_menu( [
            'theme_location' => 'primary',
            'menu_class'     => 'nav side-nav',
            'menu_id'        => 'nav-mobile'
        ] );
      endif;
      ?>

      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>
</div>