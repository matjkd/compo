
<ul>
    <li><?= anchor('/', 'Home') ?></li>
    <li><?= anchor('/news', 'News') ?></li>
 

    <li><?= anchor('/map', 'Map') ?></li>
   
        <li><?= anchor('/mailbox', 'Virtual Office') ?></li>
        
         <li><?= anchor('/tenants', 'Tenants') ?></li>
          <li><?= anchor('/othersites', 'Other Sites') ?></li>
    <li><?= anchor('/contact', 'Contact') ?></li>


    <?php
    $is_logged_in = $this->session->userdata('is_logged_in');
    $role = $this->session->userdata('role');
    if ($is_logged_in != 0 || $role == 1) {

        echo anchor('admin', 'Admin');
    }
    ?>

</ul>

