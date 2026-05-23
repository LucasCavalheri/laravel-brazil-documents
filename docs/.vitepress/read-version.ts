import { readFileSync } from 'node:fs'
import { dirname, resolve } from 'node:path'
import { fileURLToPath } from 'node:url'

const packageRoot = resolve(dirname(fileURLToPath(import.meta.url)), '../..')

export function readPackageVersion(): string {
  return readFileSync(resolve(packageRoot, 'VERSION'), 'utf-8').trim()
}
