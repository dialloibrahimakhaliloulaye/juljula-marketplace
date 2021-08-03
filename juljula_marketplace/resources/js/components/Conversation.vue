<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                list des utilisateurs
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-centered">
                        <span>Chat</span>
                    </div>
                    <div class="card-body chat-msg">
                        <ul class="chat">
                            <li class="sender clearfix">
                                <span class="chat-img clearfix mx-2">
                                    image
                                </span>
                                <div class="chat-body2 clearfix">
                                    <div class="header clearfix">
                                        <strong>Nom</strong>
                                        <small class="rigth text-muted">
                                            <span>
                                                date
                                            </span>
                                        </small>
                                    </div>
                                    <p>message</p>
                                </div>
                            </li>
                            <li class="buyer clearfix">
                                <span class="chat-img rigth clearfix mx-2">
                                    image
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header clearfix">
                                        <strong class="right primary-font">Nom</strong>
                                        <small class="rigth text-muted">
                                            <span>
                                                date
                                            </span>
                                        </small>
                                    </div>
                                    <p>message</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="ecrivez votre message ici">
                            <span class="input-group-btn">
                                <button class="btn btn-primary">Envoyer</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {}
</script>

<style scoped>
    .chat{
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .chat li{
        margin-bottom: 40px;
        padding-bottom: 5px;
        margin-top: 10px;
        height: 10px;
        width: 80%;
    }
    .chat li .chat-body p{
        margin: 0;
    }
    .chat-msg{
        overflow-y: scroll;
        height: 350px;
    }
    .chat-msg .chat-img{
        width: 50px;
        height: 50px;
    }
    .chat-msg .img-circle{
        border-radius: 50%;
    }
    .chat-msg .chat-img{
        display: inline-block;
    }
    .chat-msg .chat-body{
        display: inline-block;
        max-width: 80%;
        background-color: #FFC195;
        border-radius: 12.5px;
        padding: 15px;
    }
    .chat-msg .chat-body2
    {
        display: inline-block;
        max-width: 80%;
        background-color:#ccc;
        border-radius: 12.5px;
        padding: 15px;
    }
    .chat-msg .chat-body strong
    {
        color: #0169DA;
    }

    .chat-msg .buyer
    {
        text-align: right ;
        float: right;
    }
    .chat-msg .buyer p
    {
        text-align: left ;
    }
    .chat-msg .sender
    {
        text-align: left ;
        float: left;
    }
    .chat-msg .left
    {
        float: left;
    }
    .chat-msg .right
    {
        float: right;
    }

    .clearfix {
        clear: both;
    }
</style>
