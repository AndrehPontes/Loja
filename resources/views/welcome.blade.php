<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>App AccessCrédito</title>

<!-- Fonts -->
<link rel="stylesheet"
    href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Styles -->
<style>
html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
    height: auto;
    margin: 0;
}

.full-height {
    min-height: 100vh;
}

.flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
}

.position-ref {
    position: relative;
}

.top-right {
    position: absolute;
    right: 10px;
    top: 18px;
}

.content {
    padding-top:10%;
}

.title {
    font-size: 84px;
}

.m-b-md {
    margin-bottom: 30px;
}

.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 500px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}
#box-modal{
  display:flex;
}

#box-modal-02 {
    margin-left: 50px;
}

</style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div id="vue-wrapper">
            <div class="content">  
                  <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name" 
                        required v-model="newItem.name" placeholder=" Escreva seu nome">
                  </div>
                  <div class="form-group">
                    <label for="age">Idade:</label>
                    <input type="number" class="form-control" id="age" name="age" 
                        required v-model="newItem.age" placeholder=" Informe sua idade">
                  </div>
                  <div class="form-group">
                    <label for="profession">Profissão:</label>
                    <input type="text" class="form-control" id="profession" name="profession"
                        required v-model="newItem.profession" placeholder=" Informe o nome da sua profissão">
                  </div>
                  <div class="form-group">
                    <label for="cpf">Cpf:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf"
                        required v-model="newItem.cpf" placeholder=" Enter your cpf">
                  </div>
                  <div class="form-group">
                    <label for="nac">Nascimento:</label>
                    <input type="text" class="form-control" id="nac" name="nac"
                        required v-model="newItem.nac" placeholder=" Informe sua data de nascimento">
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" class="form-control" id="email" name="email"
                        required v-model="newItem.email" placeholder=" Informe seu e-mail">
                  </div>
                  <div class="form-group">
                    <label for="fone">Telefone:</label>
                    <input type="text" class="form-control" id="fone" name="fone"
                        required v-model="newItem.fone" placeholder=" Digite seu telefone">
                  </div>
                  <div class="form-group">
                    <label for="cep">Cep:</label>
                    <input type="text" class="form-control" id="cep" name="cep"
                        required v-model="newItem.cep" placeholder=" Digite seu cep">
                  </div>
                  <div class="form-group">
                    <label for="end">Endereço:</label>
                    <input type="text" class="form-control" id="end" name="end"
                        required v-model="newItem.end" placeholder=" Informe seu endereço">
                  </div>
                  <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade"
                        required v-model="newItem.cidade" placeholder=" Informe sua cidade">
                  </div>
                  <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado"
                        required v-model="newItem.estado" placeholder=" Informe seu estado">
                  </div>
                 <button class="btn btn-primary" @click.prevent="createItem()" id="name" name="name">
                    <span class="glyphicon glyphicon-plus"></span> ADICIONAR
                 </button>

                <p class="text-center alert alert-danger"
                    v-bind:class="{ hidden: hasError }">Por favor preencha todos os campos!</p>
                    <p class="text-center alert alert-danger"
                    v-bind:class="{ hidden: hasAgeError }">Digite uma idade válida!</p>
                {{ csrf_field() }}
                <p class="text-center alert alert-success"
                    v-bind:class="{ hidden: hasDeleted }">Deletado com sucesso!</p>
                <div class="table table-borderless" id="table">
                    <table class="table table-borderless" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Profissão</th>
                                <th>Cpf</th>
                                <th>Data</th>
                                <th>E-mail</th>
                                <th>Fone</th>
                                <th>Cep</th>
                                <th>Endereço</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tr v-for="item in items">
                            <td>@{{ item.id }}</td>
                            <td>@{{ item.name }}</td>
                            <td>@{{ item.age }}</td>
                            <td>@{{ item.profession }}</td>
                            <td>@{{ item.cpf }}</td>
                            <td>@{{ item.nac }}</td>
                            <td>@{{ item.email }}</td>
                            <td>@{{ item.fone }}</td>
                            <td>@{{ item.cep }}</td>
                            <td>@{{ item.end }}</td>
                            <td>@{{ item.cidade }}</td>
                            <td>@{{ item.estado }}</td>
                            
                            <td id="show-modal" @click="showModal=true; setVal(item.id, item.name, item.age, item.profession, item.cpf, item.nac, item.email, item.fone, item.cep, item.end, item.cidade, item.estado)"  class="btn btn-info" ><span
                            class="glyphicon glyphicon-pencil"></span></td>
                            <td @click.prevent="deleteItem(item)" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span></td>
                        </tr>
                    </table>
                </div>
                <modal v-if="showModal" @close="showModal=false">
                    <h3 slot="header">Edit Item</h3>
                    <div slot="body">
                  <div id="box-modal">
                    <div id ="box-modal-01">             
                        <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                required  :value="this.e_id">
                        Name: <input type="text" class="form-control" id="e_name" name="name"
                                required  :value="this.e_name">
                        Age: <input type="number" class="form-control" id="e_age" name="age"
                        required  :value="this.e_age">
                        Profession: <input type="text" class="form-control" id="e_profession" name="profession"
                        required  :value="this.e_profession">

                        Cpf: <input type="text" class="form-control" id="e_cpf" name="cpf"
                        required  :value="this.e_cpf">
                        
                        Nascimento: <input type="text" class="form-control" id="e_nac" name="nac"
                        required  :value="this.e_nac">
                   </div>

                   <div id ="box-modal-02">    
                        E-mail: <input type="text" class="form-control" id="e_email" name="email"
                        required  :value="this.e_email">

                        Telefone: <input type="text" class="form-control" id="e_fone" name="fone"
                        required  :value="this.e_fone">

                        Cep: <input type="text" class="form-control" id="e_cep" name="cep"
                        required  :value="this.e_cep">

                        Endereço: <input type="text" class="form-control" id="e_end" name="end"
                        required  :value="this.e_end">

                        Cidade: <input type="text" class="form-control" id="e_cidade" name="cidade"
                        required  :value="this.e_cidade">

                        Estado: <input type="text" class="form-control" id="e_estado" name="estado"
                        required  :value="this.e_estado">
                   </div>
                </div> 
                    <div slot="footer">
                        <button class="btn btn-default" @click="showModal = false">
                        Cancel
                      </button>
                      
                      <button class="btn btn-info" @click="editItem()">
                        Update
                      </button>
                    </div>
                  </div>  
                </modal>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/x-template" id="modal-template">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  default header
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                    
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  
                  
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </script>
</body>
</html>