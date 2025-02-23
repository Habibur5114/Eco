<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{route('admin.dashboard')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
    <hr>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-people-fill"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <hr>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
    <a href="{{route('admin.user')}}">
        <i class="bi bi-person-add" style="font-size: 18px;"></i>
        <span>User</span>
    </a>
    <hr>
   </li>
 </ul>

  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components" data-bs-toggle="collapse" href="#">
    <i class="bi bi-people-fill"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <hr>
    <ul id="components" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
    <a href="{{route('order.show')}}">
        <i class="bi bi-person-add" style="font-size: 18px;"></i>
        <span>Order</span>
    </a>
    <hr>
   </li>
  </ul>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-navv" data-bs-toggle="collapse" href="#">
        <i class="bi bi-terminal-plus"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <hr>
    <ul id="components-navv" class="nav-content collapse " data-bs-parent="#sidebar-nav">

    <li>
    <a href="{{route('product.index')}}">
        <i class="bi bi-credit-card-2-back" style="font-size: 18px;"></i>
        <span>Product</span>
    </a>
    <hr>
    </li>
    <li>
    <a href="{{route('category.index')}}">
        <i class="bi bi-credit-card-2-back" style="font-size: 18px;"></i>
        <span>Categories</span>
    </a>
    <hr>
    </li>
    <li>
    <a href="{{route('subcategory.index')}}">
        <i class="bi bi-credit-card-2-back" style="font-size: 18px;"></i>
        <span>subCategories</span>
    </a>
    <hr>
    </li>
    <li>
    <a href="{{route('childcategory.index')}}">
        <i class="bi bi-credit-card-2-back" style="font-size: 18px;"></i>
        <span>childCategories</span>
    </a>
    <hr>
    </li>

    </ul>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-navi" data-bs-toggle="collapse" href="#">
    <i class="bi bi-people-fill"></i><span>Brand</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <hr>
    <ul id="components-navi" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
    <a href="{{route('brand.index')}}">
        <i class="bi bi-person-add" style="font-size: 18px;"></i>
        <span>Brand</span>
    </a>
    <hr>
   </li>
 </ul>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-navvv" data-bs-toggle="collapse" href="#">
    <i class="bi bi-people-fill"></i><span>Coupon</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <hr>
    <ul id="components-navvv" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
    <a href="{{route('coupon.index')}}">
        <i class="bi bi-person-add" style="font-size: 18px;"></i>
        <span>Coupon</span>
    </a>
    <hr>
   </li>

  


 </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-navvve" data-bs-toggle="collapse" href="#">
    <i class="bi bi-people-fill"></i><span>Slide</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <hr>
    <ul id="components-navvve" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
    <a href="{{route('slide.index')}}">
        <i class="bi bi-person-add" style="font-size: 18px;"></i>
        <span>Slide</span>
    </a>
    <hr>
   </li>
 </ul>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-navvvv" data-bs-toggle="collapse" href="#">
    <i class="bi bi-gear-fill"></i><span>Site Setting</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <hr>
    <ul id="components-navvvv" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
    <a href="{{route('general.index')}}">
        <i class="bi bi-credit-card-2-back" style="font-size: 18px;"></i>
        <span>General </span>
    </a>
    <a href="{{route('contact.index')}}">
        <i class="bi bi-credit-card-2-back" style="font-size: 18px;"></i>
        <span>Contact</span>
    </a>
    <a href="{{route('shipping.index')}}">
        <i class="bi bi-credit-card-2-back" style="font-size: 18px;"></i>
        <span>Shipping</span>
    </a>
    <hr>
   </li>
 </ul>
  </li>
</ul>

</aside>
