@extends('profile/farmer.display')

@section('content-1')
<div id="content1">
    <div class="bg">
        <div class="table_responsive">
        <table>
          <thead>
            <tr>
              <th>Sl</th>
              <th>Image</th>
              <th>Name</th>
              <th>productId</th>
              <th>productType</th>
              <th>Quantity</th>
              <th>Unitprice</th>
              <th>Action</th>
            </tr>
          </thead>
    
          <tbody>
            <tr>
              <td>01</td>
              <td><img src="https://freetoolssite.com/wp-content/uploads/2022/02/846799.png.webp" alt=""></td>
              <td>Muhibbullah Ansary</td>
              <td>002</td>
              <td>Fruit</td>
              <td>35Kg</td>
              <td>Rs.30</td>
              <td>
                <span class="action_btn">
                  <a href="#">Edit</a>
                  <a href="#">Remove</a>
                </span>
              </td>
            </tr>
    
            <tr>
              <td>02</td>
              <td><img src="https://freetoolssite.com/wp-content/uploads/2022/02/webp-to-png.png.webp" alt=""></td>
              <td>Moshior Rahman Arif</td>
              <td>002</td>
              <td>Fruit</td>
              <td>35Kg</td>
              <td>Rs.30</td>
              <td>
                <span class="action_btn">
                  <a href="#">Edit</a>
                  <a href="#">Remove</a>
                </span>
              </td>
            </tr>
    
    
            <tr>
              <td>03</td>
              <td><img src="https://freetoolssite.com/wp-content/uploads/2022/02/youtube.png.webp" alt=""></td>
              <td>Suibe</td>
              <td>002</td>
              <td>Fruit</td>
              <td>35Kg</td>
              <td>Rs.30</td>
              <td>
                <span class="action_btn">
                  <a href="#">Edit</a>
                  <a href="#">Remove</a>
                </span>
              </td>
            </tr>
    
          </tbody>
        </table>
      </div>
    </div>

    </div>
</div>

@endsection