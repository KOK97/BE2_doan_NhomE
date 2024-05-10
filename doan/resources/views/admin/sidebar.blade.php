<!-- line 175 in base  -->
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="{{route('admin.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="fa-regular fa-user nav-icon"></i>
                  <p>User Management</p>
                </a>
              </li>
              <li>
                <a href="{{route('listProduct')}}" class="nav-link">
                  <i class="fa-solid fa-box nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li>
                <a href="{{ route('category.index' )}}" class="nav-link">
                  <i class="fa-solid fa-list nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li>
                <a href="{{route('listSale')}}" class="nav-link">
                  <i class="fa-solid fa-percent nav-icon"></i>
                  <p>Sale</p>
                </a>
              </li>
              <li>
                <a href="{{route('listAuthor')}}" class="nav-link">
                  <i class="fa-solid fa-at nav-icon"></i>
                  <p>Author</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
</nav>