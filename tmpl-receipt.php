<html>
<head>
  <meta charset="utf-8">
  <title><?php _e( 'Receipt', 'woocommerce-pos' ); ?></title>
  <style>
    /* Reset */
    * {
      background: transparent !important;
      color: #000 !important;
      box-shadow: none !important;
      text-shadow: none !important;
    }
    body, table {
      font-family: 'Arial', sans-serif;
      line-height: 1.4;
      font-size: 14px;
		margin: 30px;
    }
	.mykastore-name{
	  text-align:left;
	  margin-top: 5%;
	}
	.mykastore-name p{
	  font-size: 14px;
	  text-align: left;
	  margin-left: 22.5%;
	  margin-bottom: -6%;
	}
    h1,h2,h3,h4,h5,h6 {
      margin: 0;
    }
	.order-information {
  	  margin-bottom: 3%;
  	  margin-top: -3%;
	}  
	.order-invoice-number {
  	 
	}
	.order-invoice-number h2 {
  	  font-size: 14px;
	}
	.order-invoice-date{
  	 
	}
	.order-invoice-date h2{
  	 	font-size: 14px;
	}  
	.customer-invoice-information h2 {
       font-size: 18px;
   }  
	
	.order-thanks {
  	text-align: left !important;
  	font-size: 16px;
  	font-weight: 600;
	}
	  
    table {
      border-collapse: collapse;
      border-spacing: 0;
    }

    /* Spacing */
    .order-header, .order-addresses, .order-info, .order-items, .order-notes, .order-thanks, .colophon-policies {
      margin-bottom: 40px;
    }

    /* Header */
    .order-header {
      display: table;
      width: 100%;
    }
    .order-branding {
      display: table-cell;
      vertical-align: top;
    }
    .order-branding h1 {
      font-size: 2em;
      font-weight: bold;
    }
    .order-branding img {
      max-width: 400px;
    }
    .contact-info {
      text-align: left;
	  margin-top: 10%;
	  margin-left: -25%;
    }
	.customer-addresss #text::before {
     content: "Name: ";
	}

    /* Customer Addresses */
    .order-addresses {
      display: table;
      width: 100%;
    }
    .billing-address, .shipping-address {
      display: table-cell;
      vertical-align: top;
    }
  /* Order */
    table {
      width: 100%;
    }
    table tr {
      border-bottom: 1px solid #bbb;
    }
    table th, table td {
      padding: 6px 12px;
    }
    table.order-info {
      border-top: 3px solid #000;
    }
    table.order-info th {
      text-align: left;
      width: 30%;
    }
    table.order-items {
      border-bottom: 3px solid #000;
    }
    table.order-items thead tr {
      border-bottom: 3px solid #000;
    }
    table.order-items tbody tr:last-of-type {
      border-bottom: 1px solid #000;
    }
    .product {
      text-align: left;
    }
    .product dl {
      margin: 0;
    }
    .product dt {
      font-weight: 600;
      padding-right: 6px;
      float: left;
      clear: left;
    }
    .product dd {
      float: left;
      margin: 0;
    }
    .price {
      text-align: right;
    }
    .qty {
      text-align: center;
    }
    tfoot {
      text-align: right;
    }
    tfoot th {
      width: 70%;
    }
    tfoot tr.order-total {
      font-weight: bold;
    }
    tfoot tr.pos_cash-tendered th, tfoot tr.pos_cash-tendered td {
      border-top: 1px solid #000;
    }
	 th{
		  text-transform: uppercase;
	  }
	table.order-items {
		margin-left: 0px;
	}
	.sku {
  		text-align: left;
	}
	.quantity {
		text-align: center;
	}
	.cart_subtotal {
		text-align: right;
		text-transform: uppercase;
	}
	.payment_method {
		text-align: right;
		text-transform: uppercase;
	}
	.value {
		text-align: right;
		text-transform: uppercase;
	}
	.order_total {
		text-align: right;
		text-transform: uppercase;
	}
  
    /* Footer */
    .order-thanks {
      text-align: center;
    }
    .colophon-imprint {
      font-size: 18px;
      text-align: center;
    }
	.order-header, .order-addresses, .order-info, .order-items, .order-notes, .order-thanks, .colophon-policies {
  		margin-bottom: 30px;
	}
  </style>
</head>

<body>
<div class="mykastore-name">
	<p> MYKA STUDIO BOUTIQUE </p>
</div>	
<div class="order-header">
  <div class="order-branding">
    {{#if store.logo}}
      <img src="{{store.logo}}"><br>
    {{else}}
       <h1>{{{store.name}}}</h1>
    {{/if}}
  </div>
  <div class="contact-info">
    {{#if store.address}}{{formatAddress store.address}}<br>{{/if}}
    {{#if store.url}}{{store.url}}<br>{{/if}}
    {{#if store.email}}{{store.email}}<br>{{/if}}
    {{#if store.phone}}{{store.phone}}<br>{{/if}}
    <br>
    {{#if store.hours}}
      {{#each store.hours}}
        <strong>{{formatDay @key format="dddd"}}:</strong> {{#list this ' - '}}{{this}}{{/list}}<br>
      {{/each}}
    {{/if}}
    {{#if store.hours_note}}{{{store.hours_note}}}{{/if}}
  </div>
</div>
<div class="order-information">
  <div class="order-invoice-number">
    <h2><?php /* translators: woocommerce */ _e( 'Invoice for order:', 'woocommerce' ); ?> {{order_number}}</h2>
  </div>
  <div class="order-invoice-date">
    <h2><?php _e( 'Order Date:', 'woocommerce-pos' ); ?>
    {{formatDate completed_at format="MMMM Do YYYY"}}</h2>
  </div>
</div>

<div class="customer-addresses">
    <div class="column customer-address billing-address left">
        <address class="customer-addresss">
                {{formatAddress billing_address title="<?php /* translators: woocommerce */ _e( 'Customer Information', 'woocommerce' ); ?>"}}
     	</address>
     </div>
</div>
<div class="cus-information">
  <div class="cus-invoice-information">
  <tr>
    <th><?php /* translators: woocommerce */ _e( 'Email:  ', 'woocommerce' ); ?></th>
    <td>{{billing_address.email}}</td>
  </tr>
	<br>
  <tr>
    <th><?php /* translators: woocommerce */ _e( 'Telephone:  ', 'woocommerce' ); ?></th>
    <td>{{billing_address.phone}}</td>
  </tr>
  </div>	
</div>		
<table class="order-items">
  <thead>
    <tr>
		<th class="sku" style="width: 32.631578947368%">SKU</th>
        <th class="product" style="width: 43.157894736842%">Product</th>
        <th class="quantity" style="width: 11.578947368421%">Quantity</th>
        <th class="price" style="width: 11.578947368421%">Price</th>
        <th class="id" style="width: 1.0526315789474%"></th>
    </tr>
  </thead>
  <tbody>
  {{#each line_items}}
  	<tr>
        <td class="sku">
        	<span class="sku">{{sku}}</span>
        </td>
        <td class="product">
            <span class="product-simple product product-name">{{name}}</span><br />
        </td>

          <td class="quantity">
              <span class="quantity">{{number quantity precision="auto"}}</span>
          </td>

          <td class="price">
              <span class="price">
                    <span class="woocommerce-Price-amount amount">
                      {{#if on_sale}}
                        <del>{{{money subtotal}}}</del>
                        <ins>{{{money total}}}</ins>
                      {{else}}
                        {{{money total}}}
                      {{/if}}
                    </span>
              </span>
          </td>

          <td class="id">
              <span data-item-id="1"></span>
          </td>
  	</tr>
  {{/each}}
  </tbody>
  <tbody class="order-table-footer">
         <tr>
            <td class="cart_subtotal" colspan="3">
                <strong class="order-cart_subtotal">Subtotal:</strong>
            </td>

            <td class="value">
                <span class="woocommerce-Price-amount amount">{{{money subtotal}}}</span>
            </td>
         </tr>
         <tr>
            <td class="payment_method" colspan="3">
                <strong class="order-payment_method">Payment method:</strong>
            </td>
                <td class="value">{{payment_details.method_title}}</td>
         </tr>
         <tr>
            <td class="order_total" colspan="3">
                 <strong class="order-order_total">Total:</strong>
            </td>

            <td class="value">
                <span class="woocommerce-Price-amount amount">{{{money total}}}</span>
            </td>
        </tr>
   </tbody>
</table>
	

<div class="order-notes">{{note}}</div>
<div class="order-thanks">{{{store.notes}}}</div>
<div class="order-colophon">
  <div class="colophon-policies">{{{store.policies}}}</div>
  <div class="colophon-imprint">{{{store.footer}}}</div>
</div>
</body>
</html>
