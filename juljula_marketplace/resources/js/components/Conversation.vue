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
                                <div class="chat-body clearfix">
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
                            <li class="sender clearfix">
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
