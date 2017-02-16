#!/bin/bash
shopt -s nullglob

VAULT_CMD="ansible-vault $1 --vault-password-file=.vault_password.txt $2"
NUM_ARGS=2

show_usage() {
  echo "Usage: vault <command> <file name>

<comand> is either 'encrypt' or 'decrypt'
<site name> is the name of a file to encrypt or decrypt

Examples:
  vault encrypt group_vars/production/wordpress_sites.yml
  vault descrypt group_vars/production/wordpress_sites.yml
"
}

VAULT_FILE=".vault_password.txt"

[[ $# -ne $NUM_ARGS || $1 = -h ]] && { show_usage; exit 0; }

if [[ ! -e $VAULT_FILE ]]; then
  echo "Error: .vault_password.txt file does not exist. Please create one."
  exit 0
fi

$VAULT_CMD
