<?php
  use yii\helpers\Url;

  use hscstudio\mimin\components\Mimin;

  $menuItems =
  [
               [
                  'visible' => !Yii::$app->user->isGuest,
                  'label' => 'User / Group',
                  'icon' => 'users',
                  'url' => '#',
                  'items' => [
              ['label' => 'App. Route', 'icon' => 'user', 'url' => ['/mimin/route/'], 'visible' => !Yii::$app->user->isGuest],
              ['label' => 'Role', 'icon' => 'users', 'url' => ['/mimin/role/'], 'visible' => !Yii::$app->user->isGuest],
              ['label' => 'User', 'icon' => 'user', 'url' => ['/mimin/user/'], 'visible' => !Yii::$app->user->isGuest],
                  ], ],


[
                  'visible' => !Yii::$app->user->isGuest,
                  'label' => 'Master',
                  'icon' => 'cogs',
                  'url' => '#',
                  'items' => [
              ['label' => 'Guru', 'icon' => 'graduation-cap', 'url' => ['/guru/index'], 'visible' => !Yii::$app->user->isGuest],
              ['label' => 'Murid', 'icon' => 'user-tie', 'url' => ['/murid/index'], 'visible' => !Yii::$app->user->isGuest],
              ['label' => 'Jenis Kelas', 'icon' => 'university', 'url' => ['/jenis-kelas/index'], 'visible' => !Yii::$app->user->isGuest],
      
              ['label' => 'Kelas', 'icon' => 'university', 'url' => ['/kelas/index'], 'visible' => !Yii::$app->user->isGuest],
              ['label' => 'Laporan', 'icon' => 'book', 'url' => ['/laporan/index'], 'visible' => !Yii::$app->user->isGuest],
              ['label' => 'Agenda', 'icon' => 'book', 'url' => ['/agenda/index'], 'visible' => !Yii::$app->user->isGuest],
                
            ], ],

                  
          

[
  'visible' => !Yii::$app->user->isGuest,
  'label' => 'Akademik',
  'icon' => 'book',
  'url' => '#',
  'items' => [
['label' => 'Absensi', 'icon' => 'calendar', 'url' => ['/absensi/index'], 'visible' => !Yii::$app->user->isGuest],
['label' => 'Daily Report', 'icon' => 'paper-plane', 'url' => ['/report/index'], 'visible' => !Yii::$app->user->isGuest],
['label' => 'E - Raport', 'icon' => 'scroll', 'url' => ['/raport/index'], 'visible' => !Yii::$app->user->isGuest],


], ],


     
          ];

          
  if (!Yii::$app->user->isGuest) {
      if (Yii::$app->user->identity->username !== 'admin') {
          $menuItems = Mimin::filterMenu($menuItems);
      }
  }

    ?>
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="<?=Url::to(['/'])?>">Monitoring</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="<?=Url::to(['/'])?>">Monitoring</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li ><a class="nav-link" href="<?=Url::to(['/'])?>"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
      <li class="menu-header">Menu</li>

        <?php echo app\widgets\Menu::widget(
        [
                'items' => $menuItems,
            ]
            //Menus::menuItems()
    ); ?>
    </ul>
</aside>
