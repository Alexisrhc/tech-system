
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Printed</title>
  </head>
  <style>
	.clearfix:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	a {
	  color: #5D6975;
	  text-decoration: underline;
	}

	body {
	  position: relative;
	  /*width: 10cm;
	  height: 29.7cm;*/
	  margin: 0 auto;
	  color: #001028;
	  background: #FFFFFF;
	  font-family: Arial, sans-serif;
	  font-size: 12px;
	  font-family: Arial;
	}

	header {
	  padding: 10px 0;
	  margin-bottom: 30px;
	}

	#logo {
	  text-align: center;
	  margin-bottom: 10px;
	}

	#logo img{
		width: 350px;
	}

	h1 {
	  border-top: 1px solid  #5D6975;
	  border-bottom: 1px solid  #5D6975;
	  color: #5D6975;
	  font-size: 2.4em;
	  line-height: 1.4em;
	  font-weight: normal;
	  text-align: center;
	  margin: 0 0 20px 0;
	  /*background: url('assets/img/theme/dimension_pdf.png');*/
	}

	h3 {
	  border-top: 1px solid  #5D6975;
	  border-bottom: 1px solid  #5D6975;
	  color: #5D6975;
	  font-size: 2em;
	  line-height: 1.4em;
	  font-weight: normal;
	  text-align: center;
	  margin: 0 0 20px 0;
	  /*background: url('assets/img/theme/dimension_pdf.png');*/
	  /*background-image: url('assets/img/theme/dimension_pdf.png');*/
	}

	#project {
	  float: left;
	}

	#project span {
	  color: #5D6975;
	  text-align: right;
	  width: 80px;
	  margin-right: 10px;
	  display: inline-block;
	  font-size: 0.8em;
	}

	#company {
	  float: right;
	  text-align: right;
	}

	#project div,
	#company div {
	  white-space: nowrap;
	}

	table {
	  width: 100%;
	  border-collapse: collapse;
	  border-spacing: 0;
	  margin-bottom: 20px;
	}

	table tr:nth-child(2n-1) td {
	  background: #F5F5F5;
	}

	table th,
	table td {
	  text-align: center;
	}

	table th {
	  padding: 5px 20px;
	  color: #5D6975;
	  border-bottom: 1px solid #C1CED9;
	  white-space: nowrap;
	  font-weight: normal;
	}

	table .service,
	table .desc {
	  text-align: left;
	}

	table td {
	  padding: 20px;
	  text-align: right;
	}

	table td.service,
	table td.desc {
	  vertical-align: top;
	}

	table td.unit,
	table td.qty,
	table td.total {
	  font-size: 1.2em;
	}

	table td.grand {
	  border-top: 1px solid #5D6975;;
	}

	#notices .notice {
	  color: #5D6975;
	  font-size: 1.2em;
	}

	footer {
	  color: #5D6975;
	  width: 100%;
	  height: 30px;
	  position: absolute;
	  bottom: 0;
	  border-top: 1px solid #C1CED9;
	  padding: 8px 0;
	  text-align: center;
	}
  </style>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('assets/img/brand/blue.png') }}" width="900px">
      </div>
      <h3>COMPROVANTE DE VENTA</h3>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div>
        	<span>CLIENTE</span>
        	{{ strtoupper($bills[0]->nameUser) }}
        	{{ strtoupper($bills[0]->lastname) }}
        </div>
        <div>
        	<span>DIRECCIÓN</span>
	        {{ strtoupper($bills[0]->address) }}
	    </div>
        <div>
        	<span>E-MAIL</span>
        	<a href="mailto:{{ $bills[0]->email }}">{{ $bills[0]->email }}</a>
        </div>
        <div>
        	<span>FECHA</span>
        	{{ substr($bills[0]->created_at, 0, 10) }}
        </div>
      </div>
      <div id="project">
      	<div>
        	<span>&nbsp;</span>
      	</div>
      </div>
      <div id="project">
      	<div>
        	<span>EMPRESA</span>
        	TECHNOLOGICALPROJECT C.A.
      	</div>
      	<div>
        	<span>TELEFONO</span>
        	0000-000-00-00
      	</div>
      	<div>
        	<span>E-MAIL</span>
        	VENTAS@TECHNOLOGICALPROJECT.COM
      	</div>
      	<div>
        	<span>RIF</span>
        	j-00000000-0
      	</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">ITEM</th>
            <th class="service">MODELO</th>
            <th class="desc">DESCRIPCIÓN</th>
            <th>CANTIDAD</th>
            <th>PRECIO UNI</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        	@foreach ($bills as $index => $bill)
        		<tr>
        			<td class="service">{{  $index + 1 }}</td>
        			<td>
        				{{$bill->model}}
        			</td>
        			<td class="desc">
        				{{$bill->description}}
        			</td>
        			<td class="unit">
        				{{$bill->quantity}}
        			</td>
        			<td class="qty">
        				{{$bill->price}}
        			</td>
        			<td class="total">
        				{{$bill->price_total}}
        			</td>
        		</tr>
			@endforeach
			<tr>
	            <td colspan="5" class="grand total">TOTAL A PAGAR</td>
	            <td class="grand total">{{ $total }}</td>
	        </tr>
        </tbody>
      </table>
      {{-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> --}}
    </main>
    <footer>
    	Este comprobante de venta es generado digitalmente por Tech-System / TechnologicalProject.com
    </footer>
  </body>
</html>
