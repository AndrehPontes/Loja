
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('modal', {
  template: '#modal-template'
})

var app = new Vue({
  el: '#vue-wrapper',

  data: {
    items: [],
    hasError: true,
    hasDeleted: true,
    hasAgeError: true,
    showModal: false,
    e_name: '',
    e_age: '',
    e_id: '',
    e_profession: '',
    e_cpf: '',
    e_nac: '',
    e_email: '',
    e_fone: '',
    e_cep: '',
    e_end: '',
    e_cidade: '',
    e_estado: '',
    newItem: { 'name': '','age': '','profession': '','cpf': '','nac': '','email': '','fone': '','cep': '','end': '','cidade': '','estado': '' },
   },
  mounted: function mounted() {
    this.getVueItems();
  },
  methods: {
    getVueItems: function getVueItems() {
      var _this = this;

      axios.get('/vueitems').then(function (response) {
        _this.items = response.data;
      });
    },
    setVal(val_id, val_name, val_age, val_profession, val_cpf, val_nac, val_email, val_fone, val_cep, val_end, val_cidade, val_estado) {
        this.e_id = val_id;
        this.e_name = val_name;
        this.e_age = val_age;
        this.e_profession = val_profession;
        this.e_cpf = val_cpf;
        this.e_nac = val_nac;
        this.e_email = val_email;
        this.e_fone = val_fone;
        this.e_cep = val_cep;
        this.e_end = val_end;
        this.e_cidade = val_cidade;
        this.e_estado = val_estado;
    },

    createItem: function createItem() {
      var _this = this;
      var input = this.newItem;
      
      if (input['name'] == '' || input['age'] == '' || input['profession'] == '' || input['cpf'] == '' || input['nac'] == '' || input['email'] == '' || input['fone'] == '' || input['cep'] == '' || input['end'] == '' || input['cidade'] == '' || input['estado'] == '' ) {
        this.hasError = false;
      } else {
        this.hasError = true;
        axios.post('/vueitems', input).then(function (response) {
          _this.newItem = { 'name': '', 'age': '', 'profession': '', 'cpf': '', 'nac': '', 'email': '', 'fone': '', 'cep': '', 'end': '', 'cidade': '', 'estado': '' };
          _this.getVueItems();
        });
        this.hasDeleted = true;
      }
    },
    editItem: function(){
         var i_val_1 = document.getElementById('e_id');
         var n_val_1 = document.getElementById('e_name');
         var a_val_1 = document.getElementById('e_age');
         var p_val_1 = document.getElementById('e_profession');
         var c_val_1 = document.getElementById('e_cpf');
         var nc_val_1 = document.getElementById('e_nac');
         var em_val_1 = document.getElementById('e_email');
         var fo_val_1 = document.getElementById('e_fone');
         var ce_val_1 = document.getElementById('e_cep');
         var en_val_1 = document.getElementById('e_end');
         var ci_val_1 = document.getElementById('e_cidade');
         var es_val_1 = document.getElementById('e_estado');

          axios.post('/edititems/' + i_val_1.value, {val_1: n_val_1.value, val_2: a_val_1.value, val_3: p_val_1.value, val_4: c_val_1.value, val_5: nc_val_1.value, val_6: em_val_1.value, val_7: fo_val_1.value , val_8: ce_val_1.value, val_9: en_val_1.value, val_10: ci_val_1.value, val_11: es_val_1.value })
            .then(response => {
              this.getVueItems();
              this.showModal=false
            });
          this.hasDeleted = true;
        
  },
    deleteItem: function deleteItem(item) {
      var _this = this;
      axios.post('/vueitems/' + item.id).then(function (response) {
        _this.getVueItems();
        _this.hasError = true, 
        _this.hasDeleted = false
        
      });
    }
  }
});