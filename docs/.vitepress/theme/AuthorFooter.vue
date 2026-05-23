<script setup lang="ts">
import { useData } from 'vitepress'
import { author } from '../author'

declare const __PACKAGE_VERSION__: string

const { lang } = useData()
const isEn = lang.value === 'en-US' || lang.value === 'en' || lang.value?.startsWith('en')
const version = __PACKAGE_VERSION__
</script>

<template>
  <div class="author-footer">
    <p class="author-footer-version">v{{ version }}</p>
    <p class="author-footer-label">
      {{ isEn ? 'Created by' : 'Criado por' }}
      <a :href="author.website" target="_blank" rel="noopener noreferrer">{{ author.name }}</a>
    </p>
    <p class="author-footer-links">
      <a :href="author.website" target="_blank" rel="noopener noreferrer">
        {{ isEn ? 'Website' : 'Site' }}
      </a>
      <span aria-hidden="true">·</span>
      <a :href="author.github" target="_blank" rel="noopener noreferrer">GitHub</a>
      <span aria-hidden="true">·</span>
      <a :href="author.linkedin" target="_blank" rel="noopener noreferrer">LinkedIn</a>
    </p>
  </div>
</template>
