<div class="row-fluid">
    <div class="span12 widget">
        <div class="widget-header">
            <span class="title">Order information</span>
        </div>
        <div class="widget-content table-container">

            <table class="table table-striped table-detail-view">
                <thead>
                <tr>
                    <th colspan="2"><li class="icol-clipboard-text"></li> Order information</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Products</th>
                    <td>
                        <ul>
                            <li ng-repeat="product in model.products">
                                <strong>{{ product.pivot.quantity }}</strong>&nbsp&nbsp&nbsp * &nbsp&nbsp&nbsp
                                <a href="#{{ url.elementView('product', 'one/' + product.id) }}">{{ product.title }}</a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr ng-show="model.gifts.length > 0">
                    <th>Gifts</th>
                    <td>
                        <ul>
                            <li ng-repeat="gift in model.gifts">
                                <strong>{{ gift.pivot.quantity }}</strong>&nbsp&nbsp&nbsp * &nbsp&nbsp&nbsp
                                <a href="#{{ url.elementView('product', 'one/' + gift.id) }}">{{ gift.title }}</a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>Order total price</th>
                    <td>
                        <strong>
                            {{ model.price | currency:model.currency + ' ' }}
                        </strong>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-detail-view">
                <thead>
                <tr>
                    <th colspan="2"><li class="icol-doc-text-image"></li> User information</th>
                </tr>
                </thead>
                <tr>
                    <th>User name</th>
                    <td>{{ model.user_info.name }}</td>
                </tr>
                <tr>
                    <th>User contact information</th>
                    <td>
                        <ul>
                            <li ng-repeat="contact in model.user_info.contacts">
                                <strong>{{ contact.type }}</strong> ({{ contact.value }})
                            </li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-detail-view">
                <thead>
                <tr>
                    <th colspan="2"><li class="icol-world"></li> Delivery location</th>
                </tr>
                </thead>
                <tr>
                    <th>Country</th>
                    <td>{{ model.location.city.country.name }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ model.location.city.name }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ model.location.address }}</td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-detail-view">
                <thead>
                <tr>
                    <th colspan="2"><li class="icol-world"></li> Delivery time and day</th>
                </tr>
                </thead>
                <tr>
                    <th>Day</th>
                    <td>{{ model.delivery_day }}</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>{{ model.delivery_time }}</td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-detail-view" ng-show="model.migs_payment">
                <thead>
                <tr>
                    <th colspan="2"><li class="icol-emoticon-evilgrin"></li> Bank payment</th>
                </tr>
                </thead>
                <tr>
                    <th>Amount</th>
                    <td>{{ model.migs_payment.currency + ' ' + model.migs_payment.amount }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ model.migs_payment.status }}</td>
                </tr>
                <tr ng-show="model.migs_payment.transaction">
                    <th>Payment transaction information</th>
                    <td>
                        <div ng-repeat="(key, prop) in model.migs_payment.transaction track by key">
                            <strong>{{ key }}:</strong> {{ prop }}<br/>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-detail-view" ng-repeat="paypal_payment in model.paypal_payments">
                <thead>
                <tr>
                    <th colspan="2"><li class="icol-emoticon-evilgrin"></li> Paypal payment</th>
                </tr>
                </thead>

                <tr>
                    <th>Gross amount</th>
                    <td>
                        {{ paypal_payment.gross_amount | currency:paypal_payment.currency }}
                    </td>
                </tr>
                <tr ng-show="paypal_payment.fee_amount">
                    <th>Fee amount</th>
                    <td>
                        {{ paypal_payment.fee_amount | currency:paypal_payment.currency }}
                    </td>
                </tr>
                <tr>
                    <th>Transaction id</th>
                    <td>{{ paypal_payment.transaction_id }}</td>
                </tr>
                <tr>
                    <th>Payment status</th>

                    <td ng-show="paypal_payment.status=='34216'"><span class="label label-success">RECEIVED</span></td>
                    <td ng-show="paypal_payment.status=='55552'"><span class="label label-warning">AWAITING</span></td>
                    <td ng-show="paypal_payment.status=='34113'"><span class="label label-important">CANCELED</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>