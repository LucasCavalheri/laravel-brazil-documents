import { defineConfig } from 'vitepress'
import { author, packageGithub } from './author'
import { readPackageVersion } from './read-version'

const version = readPackageVersion()

const editLinkPattern = `${packageGithub}/edit/main/docs/:path`

const socialLinks = [
  { icon: 'github', link: packageGithub },
]

const footerPt = {
  message: `Licenciado sob MIT License · <a href="${author.website}" target="_blank" rel="noopener">${author.name}</a>`,
  copyright: `Copyright © 2026 ${author.name} · v${version}`,
}

const footerEn = {
  message: `Released under the MIT License · <a href="${author.website}" target="_blank" rel="noopener">${author.name}</a>`,
  copyright: `Copyright © 2026 ${author.name} · v${version}`,
}

const navVersion = { text: `v${version}`, link: packageGithub }

export default defineConfig({
  base: '/',
  vite: {
    define: {
      __PACKAGE_VERSION__: JSON.stringify(version),
    },
  },
  locales: {
    root: {
      label: 'Português',
      lang: 'pt-BR',
      title: 'Laravel Brazil Documents',
      description:
        'Validação, formatação, sanitização e geração de documentos brasileiros para Laravel.',
      themeConfig: {
        nav: [
          { text: 'Guia', link: '/installation' },
          { text: 'Documentos', link: '/cpf' },
          { text: 'Roadmap', link: '/roadmap' },
          navVersion,
        ],
        sidebar: [
          {
            text: 'Começando',
            items: [
              { text: 'Introdução', link: '/' },
              { text: 'Instalação', link: '/installation' },
              { text: 'Configuração', link: '/configuration' },
            ],
          },
          {
            text: 'Documentos',
            items: [
              { text: 'CPF', link: '/cpf' },
              { text: 'CNPJ', link: '/cnpj' },
              { text: 'CEP', link: '/cep' },
              { text: 'CNH', link: '/cnh' },
              { text: 'PIS/PASEP', link: '/pis' },
              { text: 'CNS', link: '/cns' },
            ],
          },
          {
            text: 'Integração Laravel',
            items: [
              { text: 'Regras de validação', link: '/validation-rules' },
              { text: 'Localização', link: '/localization' },
              { text: 'Helpers', link: '/helpers' },
              { text: 'Value Objects', link: '/value-objects' },
            ],
          },
          {
            text: 'Projeto',
            items: [
              { text: 'Testes', link: '/testing' },
              { text: 'Roadmap', link: '/roadmap' },
              { text: 'Autor', link: '/autor' },
            ],
          },
        ],
        socialLinks,
        editLink: { pattern: editLinkPattern },
        footer: footerPt,
      },
    },
    en: {
      label: 'English',
      lang: 'en',
      link: '/en/',
      title: 'Laravel Brazil Documents',
      description:
        'Validation, formatting, sanitization and generation of Brazilian documents for Laravel.',
      themeConfig: {
        nav: [
          { text: 'Guide', link: '/en/installation' },
          { text: 'Documents', link: '/en/cpf' },
          { text: 'Roadmap', link: '/en/roadmap' },
          navVersion,
        ],
        sidebar: [
          {
            text: 'Getting Started',
            items: [
              { text: 'Introduction', link: '/en/' },
              { text: 'Installation', link: '/en/installation' },
              { text: 'Configuration', link: '/en/configuration' },
            ],
          },
          {
            text: 'Documents',
            items: [
              { text: 'CPF', link: '/en/cpf' },
              { text: 'CNPJ', link: '/en/cnpj' },
              { text: 'CEP', link: '/en/cep' },
              { text: 'CNH', link: '/en/cnh' },
              { text: 'PIS/PASEP', link: '/en/pis' },
              { text: 'CNS', link: '/en/cns' },
            ],
          },
          {
            text: 'Laravel Integration',
            items: [
              { text: 'Validation Rules', link: '/en/validation-rules' },
              { text: 'Localization', link: '/en/localization' },
              { text: 'Helpers', link: '/en/helpers' },
              { text: 'Value Objects', link: '/en/value-objects' },
            ],
          },
          {
            text: 'Project',
            items: [
              { text: 'Testing', link: '/en/testing' },
              { text: 'Roadmap', link: '/en/roadmap' },
              { text: 'Author', link: '/en/author' },
            ],
          },
        ],
        socialLinks,
        editLink: { pattern: editLinkPattern },
        footer: footerEn,
      },
    },
  },
})
