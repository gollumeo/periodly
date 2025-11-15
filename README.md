# **Arkanium**

### *A Forgeborn Clean Architecture Starter for Laravel.*

Arkanium isn’t a starter kit — it’s a **forge**.
A place where code is tempered like enchanted steel: heated by intention, shaped by discipline, cooled in clarity.

Most Laravel apps begin like makeshift camps: tents thrown together, fires lit fast, tools scattered, every dev
improvising their own path. It works… until the first real battle. Then everything collapses under accidental
complexity.

Arkanium is the opposite.
It is a **runic foundation** crafted for teams who want predictability, sovereignty, and architectures that age like
adamantite, not like wet cardboard.

If Laravel is your world… Arkanium is your capital city.
The place where systems are forged properly.

---

## **Philosophy: The Three Pillars of the Forge**

### **1. Anti‑Chaos Architecture**

Chaos is the default of most modern applications.
Not because developers are bad — but because the system gives them too much room to invent their own logic.

Arkanium brings order:

* Domain logic is a sanctum, untouched by frameworks.
* Use cases are structured like quests: clear start, clear intention, clear outcome.
* Boundaries are shields — not decorative lines on diagrams.

Your application stops behaving like a camp.
It becomes a **fortress**.

---

### **2. Technical Sovereignty**

Companies lose millions on technical debt born from framework coupling.
CTOs know it. Architects fear it. Developers endure it.

Arkanium gives back control:

* Your business rules live in their own plane, immune to vendor churn.
* No helpers, no “magic”, no hidden flows.
* No more systems where “only Liam understands why this works”.

This is architecture as governance.
The kind executives expect but rarely get.

---

### **3. Organizational Discipline**

Teams are not destroyed by lack of talent.
They’re destroyed by **ambiguity**.

Arkanium removes interpretation from the daily workflow:

* A shared map of the system.
* Predictable flows for every feature.
* Less improvisation, more execution.

This is where engineering culture becomes operational consistency.

---

## **The Shape of the System**

A structure inspired by DDD, battle‑tested patterns, and the clarity of well‑tempered steel.

```
src/
  Domain/        # Entities, Value Objects, Invariants, Domain Events
  Application/   # Commands, Queries, Use Cases, Orchestration
  Infrastructure/# Providers, Adapters, Framework Integration
  Persistence/   # Repositories, Mappers, DB concerns
  Presentation/  # Controllers, HTTP, IO Models
```

Each layer exists with intention.
Nothing is decorative. Nothing is optional.

This yields:

* A domain immune to Laravel’s fluctuations.
* A clear narrative for every business capability.
* Infrastructure that bends to you — never the reverse.
* Presentation that simply translates inputs to orchestration.

---

## **The Runeforge: Commands That Shape Code**

Laravel’s `make:*` commands optimize for delivery speed.
Arkanium optimizes for **architectural integrity**.

Its forge commands don’t generate files — they **create artifacts**.
Artifacts infused with invariants, contracts, and structural discipline.

### Upcoming Runes

#### **`artisan arkanium:vo`**

Creates a Value Object with:

* immutability
* strict contracts
* validated invariants

#### **`artisan arkanium:entity`**

Shapes an Entity that reflects **real** domain responsibilities.
Not an anemic data bag.

#### **`artisan arkanium:use-case`**

Generates a Command + Handler pair that acts as a narrative unit.

Each rune is powered by:

* `ValueObjectContract`
* invariant‑driven abstract classes like `StringValueObject`
* deterministic structure across the entire application

This is not scaffolding.
This is **codified craftsmanship**.

The Grimoire (documentation) will later reveal exactly how each rune works under the hood.

---

## **Roadmap: What Is Being Forged**

### **Phase I — Emberstone Core**

* Finalize the layered structure
* Establish foundational contracts (VO, Entity, Repository, Event)
* Provide the minimal skeleton for each layer

### **Phase II — The Runeforge Awakens**

* Release Arkanium’s generator commands
* Enforce invariant‑based scaffolding
* Auto‑wire layers with explicit intention
* Explain every architectural decision behind each artifact

### **Phase III — The Grimoire of Patterns**

* Full examples of VO, Entity, Use Case, and Aggregates
* Behind‑the‑scenes explanations of the abstraction model
* Guidance for adapting Arkanium to various business domains

### **Phase IV — The Outer Realms**

* Optional modules (queues, SSE, email, external API adapters)
* Testing strategies (unit, spec, narrative, integration)
* Advanced modelling guides for complex domains

---

## **Who Is Arkanium For?**

For developers who:

* refuse chaotic foundations
* demand clarity in every feature
* want a system that scales in complexity without collapsing

For CTOs and Heads of Engineering who:

* need architecture that reduces onboarding friction
* want predictable delivery across teams
* refuse vendor‑driven complexity
* know that sovereignty beats speed‑at‑all‑costs

If you believe software should be forged — not improvised —
you belong in Arkanium.

---

## License

MIT License.
