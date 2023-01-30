@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
    
    <section class="dashboard-section">
        <div class="container">
            <div class="top_roworders"><h2>Manage Sales</h2></div>
               <div class="table_wrap">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#Priority" aria-controls="Priority" role="tab" data-toggle="tab">Priority</a></li>
                                        <li role="presentation"><a href="#New" aria-controls="New" role="tab" data-toggle="tab">New</a></li>
                                        <li role="presentation"><a href="#completed" aria-controls="completed" role="tab" data-toggle="tab">completed</a></li>
                                        <li role="presentation"><a href="#Late" aria-controls="Late" role="tab" data-toggle="tab">Late</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="PRIORITY">
                                            <div class="db-new-main-table">
                                                <table>
                                                    <thead>
                                                        <tr class="header-filter"><td colspan="9">Priority Orders</td></tr>
                                                        <tr><td></td>
                                                            <td colspan="2">Buyer</td>
                                                            <td>Gig</td>
                                                            <td></td>
                                                            <td>Due on</td>
                                                            <td>Total</td>
                                                            <td class="t-a-center">Note</td>
                                                            <td class="t-a-center" colspan="1">Status</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="9">No priority orders to show.</td>
                                                        </tr>
                                                    </tbody></table></div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="New">
                                             <div class="db-new-main-table">
                                                <table>
                                                    <thead>
                                                        <tr class="header-filter"><td colspan="9">Priority Orders</td></tr>
                                                        <tr><td></td>
                                                            <td colspan="2">Buyer</td>
                                                            <td>Gig</td>
                                                            <td></td>
                                                            <td>Due on</td>
                                                            <td>Total</td>
                                                            <td class="t-a-center">Note</td>
                                                            <td class="t-a-center" colspan="1">Status</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="9">No priority orders to show.</td>
                                                        </tr>
                                                    </tbody></table></div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="active"> <div class="db-new-main-table">
                                                <table>
                                                    <thead>
                                                        <tr class="header-filter"><td colspan="9">Priority Orders</td></tr>
                                                        <tr><td></td>
                                                            <td colspan="2">Buyer</td>
                                                            <td>Gig</td>
                                                            <td></td>
                                                            <td>Due on</td>
                                                            <td>Total</td>
                                                            <td class="t-a-center">Note</td>
                                                            <td class="t-a-center" colspan="1">Status</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="9">No priority orders to show.</td>
                                                        </tr>
                                                    </tbody></table></div></div>
                                        <div role="tabpanel" class="tab-pane" id="Late">
                                         <div class="db-new-main-table">
                                                <table>
                                                    <thead>
                                                        <tr class="header-filter"><td colspan="9">Priority Orders</td></tr>
                                                        <tr><td></td>
                                                            <td colspan="2">Buyer</td>
                                                            <td>Gig</td>
                                                            <td></td>
                                                            <td>Due on</td>
                                                            <td>Total</td>
                                                            <td class="t-a-center">Note</td>
                                                            <td class="t-a-center" colspan="1">Status</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="9">No priority orders to show.</td>
                                                        </tr>
                                                    </tbody></table></div></div>
                                    </div>
</div>
                                </div>
        </div>
    </section>
</div>

@endsection