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
      'Home',
      'Chalets',
      'Contact',
    ],
  }),
})

new Vue({
  el: '#calendar',
  vuetify: new Vuetify(),
  data: () => ({
    today: 'locales',
    focus: 'locales',
    format: '24hr',
    type: 'month',
    typeToLabel: {
      month: 'Maand',
      week: 'Week',
      day: 'Dag',
    },
    start: null,
    end: null,
    selectedEvent: {},
    selectedElement: null,
    selectedOpen: false,
    events: [
      {
        name: 'Verblijf Chalet Zee',
        details: 'gereseveerd door ',
        start: '2019-10-7',
        end: '2019-10-12',
        color: 'blue',
      },
      {
        name: 'Verblijf Chalet Strand',
        start: '2019-10-8 22:00',
        end: '2019-10-21 23:00',
        color: '#f5b642',
      },
       {
        name: 'Onderhoud Chalet Zee',
        details: ' onderhoud ',
        start: '2019-10-13 9:00',
        end: '2019-10-13 19:00',
        color: 'black',
      },
      {
        name: 'Verblijf Chalet Zee',
        details: '',
        start: '2019-10-14',
        end: '2019-10-26',
        color: 'blue',
      },
    ],
  }),
  computed: {
    title () {
      const { start, end } = this
      if (!start || !end) {
        return ''
      }

      const startMonth = this.monthFormatter(start)
      const endMonth = this.monthFormatter(end)
      const suffixMonth = startMonth === endMonth ? '' : endMonth

      const startYear = start.year
      const endYear = end.year
      const suffixYear = startYear === endYear ? '' : endYear

      const startDay = start.day + this.nth(start.day)
      const endDay = end.day + this.nth(end.day)

      switch (this.type) {
        case 'month':
          return `${startMonth} ${startYear}`
        case 'week':
        case '4day':
          return `${startMonth} ${startDay} ${startYear} - ${suffixMonth} ${endDay} ${suffixYear}`
        case 'day':
          return `${startMonth} ${startDay} ${startYear}`
      }
      return ''
    },
    monthFormatter () {
      return this.$refs.calendar.getFormatter({
        timeZone: 'GMT', month: 'long',
      })
    },
  },
  mounted () {
    this.$refs.calendar.checkChange()
  },
  methods: {
    viewDay ({ date }) {
      this.focus = date
      this.type = 'day'
    },
    getEventColor (event) {
      return event.color
    },
    setToday () {
      this.focus = this.today
    },
    prev () {
      this.$refs.calendar.prev()
    },
    next () {
      this.$refs.calendar.next()
    },
    showEvent ({ nativeEvent, event }) {
      const open = () => {
        this.selectedEvent = event
        this.selectedElement = nativeEvent.target
        setTimeout(() => this.selectedOpen = true, 10)
      }

      if (this.selectedOpen) {
        this.selectedOpen = false
        setTimeout(open, 10)
      } else {
        open()
      }

      nativeEvent.stopPropagation()
    },
    updateRange ({ start, end }) {
      // You could load events from an outside source (like database) now that we have the start and end dates on the calendar
      this.start = start
      this.end = end
    },
    nth (d) {
      return d > 3 && d < 21
        ? 'th'
        : ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'][d % 10]
    },
  },
})

new Vue ({
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

new Vue({
  el: '#formAccountEdit',
  vuetify: new Vuetify(),
  data: function data() {
    return {
      valid: true,
      name: 'name',
      nameRules: [function (v) {
        return !!v || 'Naam is verplicht';
      }],
      email: 'email',
      emailRules: [function (v) {
        return !!v || 'E-mail is verplicht';
      }, function (v) {
        return /.+@.+\..+/.test(v) || 'E-mail moet geldig zijn';
      }]
    };
  }
});
