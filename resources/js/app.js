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
        {
          src: 'images/slide2.jpg',
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
      'Home',
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