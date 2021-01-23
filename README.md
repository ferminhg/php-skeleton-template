# Devaway PHP-Skeleton app

✊ PHP is not dead ✊

Reglas del skeleton:
- using Hexagonal Architecture
- more than one app

### 🐳 Needed tools

- dotenv
- docker

### 🔥 Application execution
1. Install all the dependencies and bring up the project with Docker executing: `make build`
2. Then you'll have 3 apps available (2 APIs and 1 Frontend):
   1. [Backoffice Backend](apps/backoffice/backend): http://localhost:8040/health-check
   2. [Backoffice Frontend](apps/backoffice/frontend): http://localhost:8041/health-check

### 📜 Based on

- [README-old.md](README-old.md)
