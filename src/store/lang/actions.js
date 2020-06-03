import { Quasar } from 'quasar'
import { localize } from 'vee-validate'
import moment from 'moment'
// Lang for quasar
const qLang = lang => {
  switch (lang) {
    case 'en':
      return 'en-us'
    case 'fa':
      return 'fa-ir'
    case 'es':
      return lang
    default:
      return 'en-us'
  }
}

// Lang for veevalidate
const veeLang = lang => {
  switch (lang) {
    case 'es':
      return 'es'
    case 'en':
      return 'en'
    case 'fa':
      return 'fa'
    default:
      return 'en'
  }
}

// Lang for moment
const momentLang = lang => {
  switch (lang) {
    case 'es':
      return 'es'
    case 'en':
      return 'en-gb'
    case 'fa':
      return 'fa-ir'
    default:
      return 'en'
  }
}

// Lang for local files
const localLang = lang => {
  switch (lang) {
    case 'es':
      return 'es'
    case 'en':
      return 'en'
    case 'fa':
      return 'fa'
    default:
      return 'en'
  }
}

export default {
  async setLanguage ({ commit }, [i18n, lang]) {
    try {
      await import(`quasar/lang/${qLang(lang)}`)
      .then(language => {
          Quasar.lang.set(language.default)
        })
      await import(`vee-validate/dist/locale/${veeLang(lang)}.json`)
        .then(language => {
          localize(veeLang(lang), language)
        })
      let localL = localLang(lang)
      await import(`../../i18n/${localL}/${localL}`)
        .then(language => {
          i18n.locale = localL
          i18n.setLocaleMessage(localL, language.default)
        })
      moment.locale(momentLang(lang))
      commit('SET_LANGUAGE', lang)
      // console.log("test")

    } catch (e) {
      console.log(e)
    }
  }
}
