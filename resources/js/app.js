/**
* First, we will load all of this project's Javascript utilities and other
* dependencies. Then, we will be ready to develop a robust and powerful
* application frontend using useful Laravel and JavaScript libraries.
*/

new Vue({
  el: '#menu',
  vuetify: new Vuetify(),
})

new Vue({
  el: '#slider',
  vuetify: new Vuetify(),
  data () {
    return {
      items: [
        {
          src: 'images/slide1.jpg',
        },
      ],
    }
  },
})

new Vue({
  el: '#footer',
  vuetify: new Vuetify(),
  data: () => ({
    links: [
      '/home',
      'Chalets',
      'Contact',
    ],
    icons: [
      'fab fa-facebook',
      'fab fa-twitter',
      'fab fa-google-plus',
      'fab fa-linkedin',
      'fab fa-instagram',
    ],
  }),
})

new Vue({
    el: '#form',
    vuetify: new Vuetify(),
    data: () => ({
      valid: true,
      firstname: '',
      firstnameRules: [
        v => !!v || 'Voornaam is verplicht',
        v => (v && v.length <= 50) || 'Voornaam moet minder dan 50 karakters zijn',
      ],
      lastname: '',
      lastnameRules: [
        v => !!v || 'Achternaam is verplicht',
        v => (v && v.length <= 50) || 'Achternaam moet minder dan 50 karakters zijn',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is verplicht',
        v => /.+@.+\..+/.test(v) || 'E-mail moet geldig zijn',
      ],
      phone: '',
      phoneRules: [
        v => !!v || 'Telefoonummer is verplicht',
        v => (v && v.length <= 15) || 'Telefoonnummer moet geldig zijn',
      ],
      subject: '',
      subjectRules: [
        v => !!v || 'Onderwerp is verplicht',
        v => (v && v.length <= 300) || 'Onderwerp moet minder dan 300 karakters zijn',
      ],      
      checkbox: false,
      lazy: false,
  }),
})